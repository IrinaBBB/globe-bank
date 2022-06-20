<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>


<?php $id = $_GET['id']; ?>
<?php $admin = find_admin_by_id($id); ?>
<?php $page_title = 'Admin (' . $admin['first_name'] . ' ' . $admin['last_name'] . ')'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>
<main class="container">
    <main class="container mt-5">
        <div class="card col-md-8 card-body mx-auto">
            <h1 class="h2 text-uppercase mt-2">Admin "<?php echo h($admin['first_name']); echo ' '; echo h($admin['last_name']); ?>" with ID
                - <?php echo h($admin['id']); ?></h1>
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
            <a href="<?php echo url_for('/staff/admins/index.php'); ?>" class="btn btn-secondary mt-4">Back</a>
        </div>
        <!-- /.card card-body -->
    </main>
</main>
<?php include SHARED_PATH . '/staff_footer.php' ?>



