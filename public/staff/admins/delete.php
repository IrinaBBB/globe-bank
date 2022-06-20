<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php
if (is_post_request()) {
    $id = $_POST['id'];
    if (isset($id)) {
        $result = delete_admin($id);
        if ($result) {
            redirect_to(url_for('/staff/admins/index.php'));
        } else {
            echo 'ERROR DURING DELETION!';
        }
    }
} else { ?>
    <?php $id = $_GET['id']; ?>
    <?php if (!isset($_GET['id'])) {
        redirect_to(url_for('/staff/admins/index.php'));
    } ?>
    <?php $admin = find_admin_by_id($id); ?>
    <?php $page_title = 'Delete Admin (' . $admin['id'] . ')'; ?>
    <?php include SHARED_PATH . '/staff_header.php'; ?>
    <main class="container mt-5">
        <div class="card col-md-7 card-body mx-auto">
            <h1 class="h2 text-uppercase mt-2">Delete Admin(<?php echo $id; ?>)</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Username</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <tr>
                    <th><?php echo h($admin['id']); ?></th>
                    <td><?php echo h($admin['first_name']); ?></td>
                    <td><?php echo h($admin['last_name']); ?></td>
                    <td><?php echo h($admin['email']); ?></td>
                    <td><?php echo h($admin['username']); ?></td>
                </tr>
                </tbody>
            </table>
            <form method="post" action="" class="mt-3">
                <input type="hidden" name="id" value="<?php echo h($admin['id']); ?>">
                <button type="submit" class="btn btn-danger">Delete Admin</button>
                <a href="<?php echo url_for('/staff/admins/index.php'); ?>" class="btn btn-secondary">Back</a>
            </form>
        </div>
        <!-- /.card card-body -->
        </div>
        <!-- /.card card-body -->
    </main>
    <?php include SHARED_PATH . '/staff_footer.php' ?>
<?php } ?>

