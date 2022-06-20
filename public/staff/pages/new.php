<?php require_once '../../../private/initialize.php'; ?>
<?php require_login(); ?>

<?php
if (is_post_request()) {

    $page = [];
    $page['subject_id'] = $_POST['subject_id'];
    $page['menu_name'] = $_POST['menu_name'];
    $page['content'] = $_POST['content'];
    $page['position'] = $_POST['position'];
    $page['visible'] = $_POST['visible'];

    $errors = validate_page($page);

    if (empty($errors)) {
        $result = insert_page($page);
        if ($result) {
            redirect_to(url_for('/staff/pages/index.php'));
        }
    }
} ?>
<?php $page_title = 'New Page'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>
<main class="container mt-5">
    <div class="card col-md-7 card-body mx-auto">
        <h1 class="h2 text-uppercase mt-2">Create New Page</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="menu_name" class="form-label">Page Name</label>
                <input type="text" class="form-control" id="menu_name" name="menu_name"
                       value="<?php if (isset($page['menu_name'])) {
                           echo $page['menu_name'];
                       } ?>">
                <?php if (isset($errors['menu_name'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['menu_name']; ?></small>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="subject_id" class="form-label">Subject</label>
                <?php $subject_set = find_all_subjects(); ?>
                <select id="subject_id" name="subject_id" class="form-select">
                    <option>Select subject</option>
                    <?php while ($subject = mysqli_fetch_assoc($subject_set)): ?>
                        <option value="<?php echo $subject['id'] ?>"
                            <?php if (isset($page['subject_id'])) {
                                if ($page['subject_id'] == $subject['id']) {
                                    echo 'selected';
                                }
                            } ?>><?php echo $subject['menu_name']; ?></option>
                    <?php endwhile; ?>
                    <?php mysqli_free_result($subject_set); ?>
                </select>
                <?php if (isset($errors['subject_id'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['subject_id']; ?></small>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Page Content</label>
                <textarea class="form-control" id="content" name="content"><?php if (isset($page['content'])) {
                        echo $page['content'];
                    } ?></textarea>
                <?php if (isset($errors['content'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['content']; ?></small>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <?php $subject_count = get_pages_count(); ?>
                <?php $count = mysqli_fetch_row($subject_count)[0]; ?>
                <select id="position" name="position" class="form-select">
                    <?php for ($i = 1; $i <= $count; $i++) : ?>
                        <option value="<?php echo h($i); ?>"><?php echo h($i); ?></option>
                    <?php endfor; ?>
                    <option value="<?php echo h(($count + 1)); ?>" selected><?php echo h(($count + 1)); ?></option>
                </select>
                <?php if (isset($errors['position'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['position']; ?></small>
                <?php endif; ?>
            </div>
            <div class="form-check mb-3">
                <input type="hidden" name="visible" value="0">
                <input id="visible" class="form-check-input"
                       name="visible" type="checkbox" value="1"
                    <?php if (isset($page['visible']) && $page['visible'] == 1) {
                        echo 'checked';
                    } ?>>
                <label for="visible" class="form-check-label">
                    Visible
                </label>
                <?php if (isset($errors['visible'])) : ?>
                    <small class="form-text text-danger"><?php echo $errors['visible']; ?></small>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Create New Page</button>
            <a href="<?php echo url_for('/staff/pages/index.php'); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</main>
<?php include SHARED_PATH . '/staff_footer.php' ?>





