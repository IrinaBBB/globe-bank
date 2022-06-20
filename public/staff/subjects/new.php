<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php $subject = []; ?>
<?php
if (is_post_request()) {

    $subject['menu_name'] = $_POST['menu_name'];
    $subject['position'] = $_POST['position'];
    $subject['visible'] = $_POST['visible'];

    $errors = validate_subject($subject);

    if (empty($errors)) {
        $result = insert_subject($subject);
        $new_id = mysqli_insert_id($db);
        $_SESSION['success_message'] = "Subject '" . $subject['menu_name'] . "' has been created.";
        redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
    }
} ?>
<?php $page_title = 'Create New Subject'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>
<?php $subject_count = get_subjects_count(); ?>
<?php $default_position = $subject_count + 1; ?>
<main class="container mt-5">
    <div class="card col-md-7 card-body mx-auto">
        <h1 class="h2 text-uppercase mt-2">Create new subject</h1>
        <form action="<?php echo url_for('/staff/subjects/new.php'); ?>" method="post">
            <div class="mb-3">
                <label for="menuName" class="form-label">Menu Name</label>
                <input type="text" class="form-control" id="menuName" name="menu_name"
                       value="<?php if(isset($subject['menu_name'])) echo h($subject['menu_name']); ?>">
                <?php if (isset($errors['menu_name'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['menu_name']; ?></small>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select name="position" class="form-select">
                    <option>Select position</option>
                    <?php for ($i = 1; $i <= $subject_count; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                    <option value="<?php echo $default_position; ?>" selected><?php echo $default_position; ?></option>
                </select>
                <?php if (isset($errors['position'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['position']; ?></small>
                <?php endif; ?>
            </div>
            <div class="form-check mb-3">
                <input type="hidden" name="visible" value="0">
                <input class="form-check-input" name="visible" type="checkbox" value="1" id="visible">
                <label class="form-check-label" for="visible">
                    Visible
                </label>
                <?php if (isset($errors['visible'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['visible']; ?></small>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Create new subject</button>
            <a href="<?php echo url_for('/staff/subjects/index.php'); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <!-- /.card card-body -->
</main>
<?php include SHARED_PATH . '/staff_footer.php' ?>



