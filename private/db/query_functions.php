<?php
function find_all_subjects($options = [])
{
    global $db;
    $visible = $options['visible'] ?? false;

    $sql = "SELECT * FROM subjects ";
    if ($visible) {
        $sql .= "WHERE visible = true ";
    }
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_subject_by_id($id)
{
    global $db;
    $id = db_escape($db, $id);

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='$id'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function insert_subject($subject)
{
    global $db;

    $menu_name = db_escape($db, $subject['menu_name']);
    $position = db_escape($db, $subject['position']);
    $visible = db_escape($db, $subject['visible']);

    $sql = "INSERT INTO subjects (menu_name, position, visible) VALUES ('$menu_name', '$position', '$visible')";
    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_subject($id, $menu_name, $position, $visible)
{
    global $db;

    $sql = "UPDATE subjects SET ";
    $sql .= "menu_name='" . $menu_name . "',";
    $sql .= "position='" . $position . "',";
    $sql .= "visible='" . $visible . "' ";
    $sql .= "WHERE id='" . $id . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function get_subjects_count()
{
    $subject_set = find_all_subjects();
    return mysqli_num_rows($subject_set);
}

function delete_subject($id)
{
    global $db;
    $id = db_escape($db, $id);
    $sql = "DELETE FROM subjects WHERE id='" . $id . "' LIMIT 1";
    return mysqli_query($db, $sql);
}

function find_all_pages()
{
    global $db;
    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}



function get_pages_by_subject_id($id, $options = []) {
    global $db;

    $visible = $options['visible'] ?? false;

    $id = db_escape($db, $id);
    $sql = "SELECT * FROM pages WHERE subject_id='$id' ";
    if ($visible) {
        $sql .= "AND visible=true ";
    }
    $sql .= "ORDER BY position";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_page_by_id($id, $options = [])
{
    global $db;
    $visible = $options['visible'] ?? false;

    $id = db_escape($db, $id);

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='$id' ";
    if ($visible) {
        $sql .= "AND visible=true";
    }
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $page;
}

function insert_page($page)
{
    global $db;

    $subject_id = $page['subject_id'];
    $menu_name = $page['menu_name'];
    $position = $page['position'];
    $visible = $page['visible'];
    $content = $page['content'];

    $sql = "INSERT INTO pages (subject_id, menu_name, position, visible, content) 
                VALUES ('$subject_id', '$menu_name', '$position', '$visible', '$content')";

    echo $sql;

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_page($page)
{
    global $db;

    $id = db_escape($db, $page['id']);
    $subject_id = db_escape($db, $page['subject_id']);
    $menu_name = db_escape($db, $page['menu_name']);
    $position = db_escape($db, $page['position']);
    $visible = db_escape($db, $page['visible']);
    $content = db_escape($db, $page['content']);

    $sql = "UPDATE pages SET ";
    $sql .= "subject_id='$subject_id', menu_name='$menu_name', ";
    $sql .= "position='$position', visible='$visible', content='$content' ";
    $sql .= "WHERE id='$id' LIMIT 1";

    $result = mysqli_query($db, $sql);
    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_page($id)
{
    global $db;

    $id = db_escape($db, $id);
    $sql = "DELETE FROM pages WHERE id='" . $id . "' LIMIT 1";
    return mysqli_query($db, $sql);
}

function get_pages_count()
{
    global $db;
    $sql = "SELECT COUNT(*) FROM pages";
    return mysqli_query($db, $sql);
}

function find_all_admins() {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "ORDER BY id ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_admin_by_id($id)
{
    global $db;
    $id = db_escape($db, $id);

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE id='$id'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $subject;
}

function find_admin_by_username($username)
{
    global $db;
    $username = db_escape($db, $username);

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='$username'";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $admin;
}

function insert_admin($admin)
{
    global $db;

    $first_name = db_escape($db, $admin['first_name']);
    $last_name = db_escape($db, $admin['last_name']);
    $email = db_escape($db, $admin['email']);
    $username = db_escape($db, $admin['username']);
    $password = db_escape($db, $admin['password']);

    $sql = "INSERT INTO admins (first_name, last_name, email, username, hashed_password) VALUES ('$first_name','$last_name','$email','$username','$password')";
    $result = mysqli_query($db, $sql);
    if ($result) {
        return mysqli_insert_id($db);
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function delete_admin($id)
{
    global $db;

    $id = db_escape($db, $id);
    $sql = "DELETE FROM admins WHERE id='" . $id . "' LIMIT 1";
    return mysqli_query($db, $sql);
}


