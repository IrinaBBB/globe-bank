<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php $admin_set = find_all_admins(); ?>
<?php $admin_title = 'Admins'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>

<main>
    <main class="container">
        <h1 class="h2 text-uppercase mt-2">Admins</h1>
        <a class="d-block btn-link my-2" href="<?php echo url_for('/staff/admins/new.php'); ?>">Create New Admin</a>
        <table class="table">
            <thead class="bg-light">
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
            <?php while ($admin = mysqli_fetch_assoc($admin_set)) { ?>
                <tr>
                    <th><?php echo h($admin['id']); ?></th>
                    <td><?php echo h($admin['first_name']); ?></td>
                    <td><?php echo h($admin['last_name']); ?></td>
                    <td><?php echo h($admin['email']); ?></td>
                    <td><?php echo h($admin['username']); ?></td>
                    <td><a class="d-block btn-link my-2"
                           href="<?php echo url_for('/staff/admins/show.php?id=' . h(u($admin['id']))); ?>">View</a></td>
                    <td><a class="d-block btn-link my-2"
                           href="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($admin['id']))); ?>">Edit</a></td>
                    <td><a class="d-block btn-link my-2"
                           href="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin['id']))); ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php mysqli_free_result($admin_set); ?>
    </main>
</main>
<?php include SHARED_PATH . '/staff_footer.php' ?>


