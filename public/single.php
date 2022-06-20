<?php require_once '../private/initialize.php'; ?>
<?php $id = $_GET['id']; ?>
<?php if (!isset($id)) redirect_to(url_for('/index.php')); ?>
<?php $page_single = find_page_by_id($id, ['visible' => true]); ?>
<?php if (!$page_single) redirect_to(url_for('/index.php')); ?>
<?php $page_title = 'Page' ?>
<?php include SHARED_PATH . '/public_header.php'; ?>
    <div class="collapse navbar-collapse" id="navbarNav" style="position: fixed; width: 100%; top: 110px;">
        <?php include SHARED_PATH . '/public_navigation.php'; ?>
    </div>
    <div class="content">
    <div class="sidebar">
        <?php include SHARED_PATH . '/public_navigation.php'; ?>
    </div>

    <main class="main">
        <h1 class="h2 text-center text-secondary"><?php echo $page_single['menu_name']; ?></h1>
        <p><?php echo $page_single['content']; ?></p>
    </main>
<?php include SHARED_PATH . '/public_footer.php'; ?>