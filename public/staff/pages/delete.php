<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php
if (is_post_request()) {
    $id = $_POST['id'];
    if (isset($id)) {
        $result = delete_page($id);
        if ($result) {
            redirect_to(url_for('/staff/pages/index.php'));
        } else {
            echo 'ERROR DURING DELETION!';
        }
    }
} else { ?>
    <?php $id = $_GET['id']; ?>
    <?php if (!isset($_GET['id'])) {
        redirect_to(url_for('/staff/pages/index.php'));
    } ?>
    <?php $page = find_page_by_id($id); ?>
    <?php $page_title = 'Delete Page (' . $page['id'] . ')'; ?>
    <?php include SHARED_PATH . '/staff_header.php'; ?>
    <main class="container mt-5">
        <div class="card col-md-7 card-body mx-auto">
            <h1 class="h2 text-uppercase mt-2">Delete Page(<?php echo $id; ?>)</h1>
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
                    <td><?php echo h($page['visible']); ?></td>
                </tr>
                </tbody>
            </table>
            <span style="overflow-y: scroll; max-height: 300px;"><?php echo h($page['content']); ?></span>
            <form method="post" action="" class="mt-3">
                <input type="hidden" name="id" value="<?php echo h($page['id']); ?>">
                <button type="submit" class="btn btn-danger">Delete Page</button>
                <a href="<?php echo url_for('/staff/pages/index.php'); ?>" class="btn btn-secondary">Back</a>
            </form>
        </div>
        <!-- /.card card-body -->
        </div>
        <!-- /.card card-body -->
    </main>
    <?php include SHARED_PATH . '/staff_footer.php' ?>
<?php } ?>

