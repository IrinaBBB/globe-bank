<?php if (!isset($page_title)) {
    $page_title = 'Staff Area';
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/staff.css'); ?>">
    <link rel="icon" type="image/png" href="<?php echo url_for('/images/favicon.ico'); ?>"/>
    <title>Globe Bank &#8211; <?php echo h($page_title); ?></title>
</head>
<body>
<nav class="navbar navbar-light bg-primary">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo url_for('/staff/index.php'); ?>">
            <img src="<?php echo WWW_ROOT . '/images/staff/teamwork.png' ?>" alt="logo" class="staff-logo me-3">
            <span class="text-light">GBI Staff Area</span>
        </a>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="false">
                Menu
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="<?php echo url_for('/staff/pages/index.php'); ?>">Pages</a></li>
                <li><a class="dropdown-item" href="<?php echo url_for('/staff/subjects/index.php'); ?>">Subjects</a></li>
                <li><a class="dropdown-item" href="<?php echo url_for('/staff/admins/index.php'); ?>">Admins</a></li>
                <li><a class="dropdown-item" href="<?php echo url_for('/staff/login.php'); ?>">Login</a></li>
                <li><a class="dropdown-item" href="<?php echo url_for('/staff/logout.php'); ?>">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
