<?php
require 'Dbm.php';
header("Content-Type: application/json");
session_start();
$user_name = $_SESSION['user_name'];
$id = $_SESSION['user_id'];
if (empty($id)) {
    echo json_encode(array(
        "success" => false,
        "message" => "You should login first."
    ));
    exit;
}
$db = new Database();
$time=htmlentities($_POST['day']);

$where = "`time`=".mysqli_escape_string($time)." AND `user_id`=$id";
$res = $db->getAllWhere('tbl_event', $where);

if ($res!==false) {
    echo json_encode(array(
        "success" => true,
        "data"=>$res
    ));
    exit;
} else {
    echo json_encode(array(
        "success" => false
    ));
    exit;
}
