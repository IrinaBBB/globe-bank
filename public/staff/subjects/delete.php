<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>
<?php
if (is_post_request()) {
    $id = $_POST['id'];
    if (isset($id)) {
        $result = delete_subject($id);
        if ($result) {
            redirect_to(url_for('/staff/subjects/index.php'));
        } else {
            echo 'ERROR DURING DELETION!';
        }
    }
} else { ?>
    <?php $id = $_GET['id']; ?>
    <?php if (!isset($_GET['id'])) {
        redirect_to(url_for('/staff/subjects/index.php'));
    } ?>
    <?php $subject = find_subject_by_id($id);  ?>
    <?php $page_title = 'Delete Subject (' . $id . ')'; ?>
    <?php include SHARED_PATH . '/staff_header.php'; ?>
    <main class="container mt-5">
        <div class="card col-md-7 card-body mx-auto">
            <h1 class="h2 text-uppercase mt-2">Delete Subject(<?php echo $id; ?>)</h1>
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
            <form method="post" action="">
                <input type="hidden" name="id" value="<?php echo h($subject['id']); ?>">
                <button type="submit" class="btn btn-danger">Delete Subject</button>
                <a href="<?php echo url_for('/staff/subjects/index.php'); ?>" class="btn btn-secondary">Back</a>
            </form>
        </div>
        <!-- /.card card-body -->
        </div>
        <!-- /.card card-body -->
    </main>
    <?php include SHARED_PATH . '/staff_footer.php' ?>
<?php } ?>

