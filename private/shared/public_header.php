<?php if (!isset($page_title)) {
    $page_title = 'Globe Bank';
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/public.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
          integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="icon" type="image/png" href="<?php echo url_for('/images/public/favicon.ico'); ?>"/>
    <title>Globe Bank &#8211; <?php echo h($page_title); ?></title>
</head>
<body>
<nav class="navbar navbar-light bg-primary pt-3 pb-3" style="position: fixed;width: 100%; z-index: 5;top:0;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?php echo url_for('/index.php'); ?>">
            <img src="<?php echo WWW_ROOT . '/images/public/bitcoin.svg' ?>" alt="logo" class="main-logo me-1 mb-2">
            <span class="main-logo-text text-light">Globe Bank</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<!-- /.sidebar -->
