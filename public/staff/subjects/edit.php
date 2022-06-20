<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php $subject = []; ?>
<?php
if (is_post_request()) {
    $subject['id'] = $_POST['id'];
    $subject['menu_name'] = $_POST['menu_name'] ?? '';
    $subject['position'] = $_POST['position'] ?? '';
    $subject['visible'] = $_POST['visible'] ?? '';

    $errors = validate_subject($subject);

    if(empty($errors)) {
        $result = update_subject($subject['id'], $subject['menu_name'], $subject['position'], $subject['visible']);
        if ($result) {
            redirect_to(url_for('/staff/subjects/show.php?id=' . $subject['id']));
        }
    }
} ?>
<?php
$id = $_GET['id'];
if (!isset($_GET['id'])) {
    redirect_to(url_for('/staff/subjects/index.php'));
}
if (empty($subject)) {
    $subject = find_subject_by_id($id);
}
$subject_count = get_subjects_count();
?>
<?php $page_title = 'Edit Subject (' . $subject['id'] . ')'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>
<main class="container mt-5">
    <div class="card col-md-7 card-body mx-auto">
        <h1 class="h2 text-uppercase mt-2">Edit Subject with ID <?php echo $subject['id']; ?></h1>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $subject['id']; ?>">
            <div class="mb-3">
                <label for="menuName" class="form-label">Menu Name</label>
                <input type="text" class="form-control" id="menuName" name="menu_name"
                       value="<?php if (isset($subject['menu_name'])) echo h($subject['menu_name']); ?>">
                <?php if (isset($errors['menu_name'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['menu_name']; ?></small>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <select id="position" name="position" class="form-select">
                    <?php for ($i = 1; $i <= $subject_count; $i++) { ?>
                        <option value="<?php echo $i; ?>" <?php if ($subject['position'] == $i) echo 'selected'; ?>><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <?php if (isset($errors['position'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['position']; ?></small>
                <?php endif; ?>
            </div>
            <div class="form-check mb-3">
                <input type="hidden" name="visible" value="0">
                <input class="form-check-input"
                       name="visible" type="checkbox"
                       value="1" id="visible"
                    <?php if ($subject['visible'] == 1) echo 'checked'; ?>
                >
                <label class="form-check-label" for="visible">
                    Visible
                </label>
                <?php if (isset($errors['visible'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['visible']; ?></small>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Edit subject</button>
            <a href="<?php echo url_for('/staff/subjects/index.php'); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <!-- /.card card-body -->
</main>
<?php include SHARED_PATH . '/staff_footer.php' ?>



