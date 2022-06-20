<?php require_once '../../private/initialize.php'; ?>
<?php
$errors = [];
$username = '';
$password = '';

if (is_post_request()) {

    $admin = [];

    $admin['username'] = $_POST['username'] ?? '';
    $admin['password'] = $_POST['password'] ?? '';

    // TODO: Form input validation

    $admin_db = find_admin_by_username($admin['username']);
    print_r($admin_db);
    print_r('password ver' . password_verify($admin['password'], $admin_db['hashed_password']));

    if ($admin_db) {
        if (password_verify($admin['password'], $admin_db['hashed_password'])) {
            log_in_admin($admin_db);
            redirect_to(url_for('/staff/index.php'));
        } else {
            echo 'Login was unsuccessful';
        }
    } else {
        // no username was found
        echo 'Login was unsuccessful';
    }
}

?>
<?php $page_title = 'Login' ?>
<?php include SHARED_PATH . '/staff_header.php'; ?>

<main class="main">
    <div class="container">
        <div class="card m-auto mt-5" style="width: 40rem;">
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username/Email</label>
                        <input type="text" name="username" class="form-control" id="email"
                               placeholder="Enter your username or email...">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Enter your password...">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
</main>
<?php include SHARED_PATH . '/public_footer.php'; ?>
