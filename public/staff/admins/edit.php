<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php $admin = []; ?>
<?php
if (is_post_request()) {

    $admin['first_name'] = $_POST['first_name'];
    $admin['last_name'] = $_POST['last_name'];
    $admin['email'] = $_POST['email'];
    $admin['username'] = $_POST['username'];
    $admin['password'] = $_POST['password'];

    $errors = validate_admins($admin);

    if (empty($errors)) {
        $result = insert_admin($admin);

        if ($result) {
            redirect_to(url_for('/staff/admins/show.php?id=' . $result));
        }
    }
} ?>
<?php
$id = $_GET['id'];
if (!isset($_GET['id']) or !is_numeric($id)) {
    redirect_to(url_for('/staff/admins/index.php'));
}
?>
<?php if (empty($admin)) {
    $admin = find_admin_by_id($id);
    $admin['password'] = $admin['hashed_password'];
} ?>
<?php $page_title = 'New Admin'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>
    <main class="container mt-5">
        <div class="card col-md-7 card-body mx-auto">
            <h1 class="h2 text-uppercase mt-2">Create New Admin</h1>
            <form action="" method="post">
                <!-- First Name -->
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                           value="<?php if (isset($admin['first_name'])) {
                               echo $admin['first_name'];
                           } ?>">
                    <?php if (isset($errors['first_name'])) : ?>
                        <small class="form-text text-danger"><?php echo $errors['first_name']; ?></small>
                    <?php endif; ?>
                </div>
                <!-- Last Name -->
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                           value="<?php if (isset($admin['last_name'])) {
                               echo $admin['last_name'];
                           } ?>">
                    <?php if (isset($errors['last_name'])) : ?>
                        <small class="form-text text-danger"><?php echo $errors['last_name']; ?></small>
                    <?php endif; ?>
                </div>
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?php if (isset($admin['email'])) {
                               echo $admin['email'];
                           } ?>">
                    <?php if (isset($errors['email'])) : ?>
                        <small class="form-text text-danger"><?php echo $errors['email']; ?></small>
                    <?php endif; ?>
                </div>
                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username"
                           value="<?php if (isset($admin['username'])) {
                               echo $admin['username'];
                           } ?>">
                    <?php if (isset($errors['username'])) : ?>
                        <small class="form-text text-danger"><?php echo $errors['username']; ?></small>
                    <?php endif; ?>
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password"
                           value="<?php if (isset($admin['password'])) {
                               echo $admin['password'];
                           } ?>">
                    <?php if (isset($errors['password'])) : ?>
                        <small class="form-text text-danger"><?php echo $errors['password']; ?></small>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Update Admin</button>
                <a href="<?php echo url_for('/staff/admins/index.php'); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </main>
<?php include SHARED_PATH . '/staff_footer.php' ?>