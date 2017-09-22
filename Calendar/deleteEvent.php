<?php

require 'Dbm.php';
header("Content-Type: application/json");
session_start();
$user_name = $_SESSION['user_name'];
$id = $_SESSION['user_id'];
$db = new Database();
$event_id=htmlentities($_POST['id']);

$where = "`event_id`=$event AND `user_id`=$id";
$res = $db->deleteWhere('tbl_event', $where);

if ($res!==false) {
    echo json_encode(array(
        "success" => true
    ));
    exit;
} else {
    echo json_encode(array(
        "success" => false
    ));
    exit;
}
