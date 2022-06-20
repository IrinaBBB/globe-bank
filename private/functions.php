<?php

function url_for($script_path): string
{
    if ($script_path[0] !== '/') {
        $script_path = '/' . $script_path;
    }
    return WWW_ROOT . $script_path;
}

function u($string = ''): string
{
    return urlencode($string);
}

function raw_u($string = ''): string
{
    return rawurlencode($string);
}

function h($string = ''): string
{
    return htmlspecialchars($string);
}

function error_404()
{
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    include SHARED_PATH . '/404.php';
    die();
}

function error_500()
{
    header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error');
    exit();
}

function redirect_to($location)
{
    header('Location: ' . $location);
    exit;
}

function is_post_request(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function is_get_request(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}

function validate_page($page): array
{
    $errors = [];

    if ($page['menu_name'] === '' or !isset($page['menu_name'])) {
        $errors['menu_name'] = 'You should choose a name for your page';
    }

    if (strlen($page['menu_name']) < 3) {
        $errors['menu_name'] = 'Page name should contain more symbols';
    }

    if ($page['subject_id'] == '' or !isset($page['subject_id']) or !is_numeric($page['subject_id'])) {
        $errors['subject_id'] = 'You should choose a subject for the page you are adding';
    }

    if ($page['content'] == '' or !isset($page['content'])) {
        $errors['content'] = 'Your page should have content';
    }

    if ($page['position'] == '' or !isset($page['position']) or !is_numeric($page['position'])
            or $page['position'] <= 0) {
        $errors['position'] = 'You should choose a position for the page you are adding';
    }

    if ($page['visible'] == ''
        or !isset($page['visible']) or !is_numeric($page['visible'])
        or $page['visible'] < 0 or $page['visible'] > 1
    ) {
        $errors['visible'] = 'You should choose if your page will be visible or not';
    }

    return $errors;
}

function validate_subject($subject): array
{
    $errors = [];

    if ($subject['menu_name'] === '' or !isset($subject['menu_name'])) {
        $errors['menu_name'] = 'Subject should have a name';
    }

    if (strlen($subject['menu_name']) < 3) {
        $errors['menu_name'] = 'Subject name should contain more symbols';
    }

    if ($subject['position'] == '' or !isset($subject['position']) or !is_numeric($subject['position'])
        or $subject['position'] <= 0) {
        $errors['position'] = 'You should choose a position for the subject you are adding';
    }

    if ($subject['visible'] == ''
        or !isset($subject['visible']) or !is_numeric($subject['visible'])
        or $subject['visible'] < 0 or $subject['visible'] > 1
    ) {
        $errors['visible'] = 'You should choose if your page will be visible or not';
    }

    return $errors;
}

function validate_admins($admin): array
{
    $errors = [];

    if (empty($admin['first_name'])) {
        $errors['first_name'] = 'Admin should have a first name';
    }

    if (empty($admin['last_name'])) {
        $errors['last_name'] = 'Admin should have a last name';
    }

    if (empty($admin['email'])) {
        $errors['email'] = 'Admin should have an email';
    }

    if (empty($admin['username'])) {
        $errors['username'] = 'Admin should have a username';
    }

    if (empty($admin['password'])) {
        $errors['password'] = 'Admin should have a password';
    }

    return $errors;
}












