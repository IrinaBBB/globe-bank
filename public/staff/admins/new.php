<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php
if (is_post_request()) {

    $admin = [];
    $admin['first_name'] = $_POST['first_name'];
    $admin['last_name'] = $_POST['last_name'];
    $admin['email'] = $_POST['email'];
    $admin['username'] = $_POST['username'];
    $admin['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $errors = validate_admins($admin);

    if (empty($errors)) {
        $result = insert_admin($admin);

        if ($result) {
            redirect_to(url_for('/staff/admins/show.php?id=' . $result));
        }
    }
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
                       value="<?php if (isset($page['first_name'])) {
                           echo $page['first_name'];
                       } ?>">
                <?php if (isset($errors['first_name'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['first_name']; ?></small>
                <?php endif; ?>
            </div>
            <!-- Last Name -->
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                       value="<?php if (isset($page['last_name'])) {
                           echo $page['last_name'];
                       } ?>">
                <?php if (isset($errors['last_name'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['last_name']; ?></small>
                <?php endif; ?>
            </div>
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="<?php if (isset($page['email'])) {
                           echo $page['email'];
                       } ?>">
                <?php if (isset($errors['email'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['email']; ?></small>
                <?php endif; ?>
            </div>
            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                       value="<?php if (isset($page['username'])) {
                           echo $page['username'];
                       } ?>">
                <?php if (isset($errors['username'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['username']; ?></small>
                <?php endif; ?>
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password"
                       value="<?php if (isset($page['password'])) {
                           echo $page['password'];
                       } ?>">
                <?php if (isset($errors['password'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['password']; ?></small>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Create New Admin</button>
            <a href="<?php echo url_for('/staff/admins/index.php'); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</main>
<?php include SHARED_PATH . '/staff_footer.php' ?>






