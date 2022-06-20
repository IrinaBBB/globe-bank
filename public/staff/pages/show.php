<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php $id = $_GET['id']; ?>
<?php $page = find_page_by_id($id); ?>
<?php $page_title = 'Page (' . $id . ')'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>
<main class="container">
    <main class="container mt-5">
        <div class="card col-md-8 card-body mx-auto">
            <h1 class="h2 text-uppercase mt-2">Page "<?php echo h($page['menu_name']); ?>" with ID
                - <?php echo h($page['id']); ?></h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Visible</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th><?php echo h($page['id']); ?></th>
                    <td><?php echo h($page['menu_name']); ?></td>
                    <td>
                        <?php $subject = find_subject_by_id($page['subject_id']); ?>
                        <?php echo $subject['menu_name']; ?>
                    </td>
                    <td><?php if ($page['visible'] == 1) {
                            echo 'true';
                        } else {
                            echo 'false';
                        } ?></td>
                </tr>
                </tbody>
            </table>
            <span style="overflow-y: scroll; max-height: 270px;"><?php echo h($page['content']); ?></span>
            <a href="<?php echo url_for('/staff/pages/index.php'); ?>" class="btn btn-secondary mt-4">Back</a>
        </div>
        <!-- /.card card-body -->
    </main>
</main>
<?php include SHARED_PATH . '/staff_footer.php' ?>


