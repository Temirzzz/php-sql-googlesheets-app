<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
require_once('./core/config.php');
require_once('./core/functions.php');
$conn = connect();
insertData($conn);
closeConn($conn);