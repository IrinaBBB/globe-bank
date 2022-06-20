<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php $subject_set = find_all_subjects(); ?>
<?php $page_title = 'Subjects'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>
<main class="container">
    <h1 class="h2 text-uppercase mt-2">Subjects</h1>
    <a class="d-block btn-link my-2" href="<?php echo url_for('/staff/subjects/new.php'); ?>">Create New Subject</a>
    <table class="table">
        <thead class="bg-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Position</th>
            <th scope="col">Visible</th>
            <th scope="col">Name</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
            <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($subject = mysqli_fetch_assoc($subject_set)) { ?>
            <tr>
                <th><?php echo h($subject['id']); ?></th>
                <td><?php echo h($subject['position']); ?></td>
                <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
                <td><?php echo h($subject['menu_name']); ?></td>
                <td><a class="d-block btn-link my-2"
                       href="<?php echo url_for('/staff/subjects/show.php?id=' . h(u($subject['id']))); ?>">View</a></td>
                <td><a class="d-block btn-link my-2" href="<?php echo url_for('/staff/subjects/edit.php?id=' . h(u($subject['id']))); ?>">Edit</a></td>
                <td><a class="d-block btn-link my-2" href="<?php echo url_for('/staff/subjects/delete.php?id=' . h(u($subject['id']))); ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php mysqli_free_result($subject_set); ?>
</main>
<?php include SHARED_PATH . '/staff_footer.php' ?>

