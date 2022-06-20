<?php require_once '../../private/initialize.php'; ?>
<?php require_login(); ?>
<?php $page_title = 'Staff Menu'; ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>
    <p>User: <?php echo $_SESSION['admin_id'] ?? ''; ?></p>
<?php include SHARED_PATH . '/staff_footer.php'; ?>


