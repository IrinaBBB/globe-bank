<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php $page_set = find_all_pages(); ?>
<?php $page_title = 'Pages'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>

<main>
    <main class="container">
        <h1 class="h2 text-uppercase mt-2">Pages</h1>
        <a class="d-block btn-link my-2" href="<?php echo url_for('/staff/pages/new.php'); ?>">Create New Page</a>
        <table class="table">
            <thead class="bg-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Subject</th>
                <th scope="col">Position</th>
                <th scope="col">Visible</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <?php while ($page = mysqli_fetch_assoc($page_set)) { ?>
                <tr>
                    <th><?php echo h($page['id']); ?></th>
                    <td><?php echo h($page['menu_name']); ?></td>
                    <td>
                        <?php $subject = find_subject_by_id($page['subject_id']); ?>
                        <?php echo $subject['menu_name']; ?>
                    </td>
                    <td><?php echo h($page['position']); ?></td>
                    <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
                    <td><a class="d-block btn-link my-2"
                           href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id']))); ?>">View</a></td>
                    <td><a class="d-block btn-link my-2"
                           href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
                    <td><a class="d-block btn-link my-2"
                           href="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($page['id']))); ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php mysqli_free_result($page_set); ?>
    </main>
</main>
<?php include SHARED_PATH . '/staff_footer.php' ?>


