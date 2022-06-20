<?php
ob_start();
session_start();

define('PROJECT_PATH', $_SERVER['DOCUMENT_ROOT']);
const PRIVATE_PATH = PROJECT_PATH . '/private';
const PUBLIC_PATH = PROJECT_PATH . '/public';
const SHARED_PATH = PRIVATE_PATH . '/shared';

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define('WWW_ROOT', $doc_root);

require_once('functions.php');
require_once(PRIVATE_PATH . '/db/database.php');
require_once(PRIVATE_PATH . '/db/query_functions.php');
require_once(PRIVATE_PATH . '/auth/functions.php');

$db = db_connect();
