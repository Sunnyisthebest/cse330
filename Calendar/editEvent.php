<?php

require 'Dbm.php';
header("Content-Type: application/json");
session_start();
$user_name = $_SESSION['user_name'];
$id = $_SESSION['user_id'];
$db = new Database();
$day=htmlentities($_POST['day']);
$month=htmlentities($_POST['month']);
$year = htmlentities($_POST['year']);
$subject = htmlentities($_POST['subject']);
$description = htmlentities($_POST['description']);
$tag = htmlentities($_POST['tag']);
$share=htmlentities($_POST['share']);
//open the file and testify the username and pwd
$time=$year.$month.$day;
$date = new \DateTime();
$event_id = $date->getTimestamp();
if (!empty($share)) {
    $fields = array('event_id','user_name','user_id','subject','description','tag','time');
    $values = array($event_id,$user_name,$id,$subject,$description,$tag,$tiime);
    $res = $db->insertRow($fields, $values, 'tbl_event');

    $where = ["field" => "user_id", "val" => $share];
    $share_user_info = $db->getAll("user", $where);
    if ($share_user_info !==false) {
        $share_user_name = $share_user_info["user_name"];

        $fields2 = array('event_id','user_name','user_id','subject','description','tag','time');
        $values2 = array($event_id,$share_user_name,$share,$subject,$description,$tag,$tiime);
        $res = $db->insertRow($fields2, $values2, 'tbl_event');
    } else {
        $res = false;
    }
} else {
    $fields = array('event_id','user_name','user_id','subject','description','tag','time');
    $values = array($event_id,$user_name,$id,$subject,$description,$tag,$tiime);
    $res = $db->insertRow($fields, $values, 'tbl_event');
}

if ($res!==false) {
    echo json_encode(array(
        "success" => true
    ));
    exit;
} else {
    echo json_encode(array(
        "success" => false,
        "message" => "Cannot create event"
    ));
    exit;
}
