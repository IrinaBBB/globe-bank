<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php $id = h($_GET['id'] ?: '1'); ?>
<?php $subject = find_subject_by_id($id); ?>
<?php $page_title = 'Subject (' . h($id) . ')'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>
    <main class="container mt-5">
        <?php if ($_SESSION['success_message']) :?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $_SESSION['success_message']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <?php unset($_SESSION['success_message']); ?>
        <div class="card col-md-7 card-body mx-auto">
            <h1 class="h2 text-uppercase mt-2">Subject ID(<?php echo $subject['id'] ?>)</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Visible</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th><?php echo h($subject['id']); ?></th>
                    <td><?php echo h($subject['menu_name']); ?></td>
                    <td><?php echo h($subject['position']); ?></td>
                    <td><?php echo h($subject['visible']); ?></td>
                </tr>
                </tbody>
            </table>
            <a href="<?php echo url_for('/staff/subjects/index.php'); ?>" class="btn btn-secondary">Back</a>
        </div>
        <!-- /.card card-body -->
    </main>
<?php include SHARED_PATH . '/staff_footer.php' ?>