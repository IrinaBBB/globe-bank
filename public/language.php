<?php require_once '../private/initialize.php'; ?>
<?php

if (is_post_request()) {
    $chosen_language = $_POST['language'] ?? 'Any';
    $expire = time() + 60*60*24*365;
    setcookie('language', $chosen_language, $expire);
} else {
    $chosen_language = $_COOKIE['language'] ?? 'None';
}

?>
<?php $page_title = 'Languages' ?>
<?php include SHARED_PATH . '/public_header.php'; ?>
    <div class="collapse navbar-collapse" id="navbarNav" style="position: fixed; width: 100%; top: 110px;">
        <?php include SHARED_PATH . '/public_navigation.php'; ?>
    </div>
    <div class="content">
    <div class="sidebar">
        <?php include SHARED_PATH . '/public_navigation.php'; ?>
    </div>

    <main class="main">
        <h1 class="h2 text-secondary">Set language preference</h1>
        <p>The currently selected language is <?php echo $chosen_language; ?></p>
        <div class="mb-3">
            <form method="post" action="">
                <?php $language_choices = ['Any', 'English', 'Spanish', 'French', 'German']; ?>
                <label for="language" class="form-label">Language</label>
                <select id="language" name="language" class="form-select" style="width: 400px;">
                    <?php foreach ($language_choices as $language) { ?>
                        <option value="<?php echo $language; ?>" <?php if ($chosen_language == $language) echo 'selected'; ?>><?php echo $language; ?></option>
                    <?php } ?>
                </select>
                <button class="btn btn-primary mt-3" type="submit">Select language</button>
            </form>
        </div>
    </main>
<?php include SHARED_PATH . '/public_footer.php'; ?>