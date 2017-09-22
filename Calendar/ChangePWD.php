<?php

require 'Dbm.php';
require 'Alert.php';

$db = new Database();
$msg = '';
$alert = new Alert($msg);
$name=htmlentities($_POST['username']);
$pwd=htmlentities($_POST['pwd']);
$answer = htmlentities($_POST['answer']);
$db = new Database();
$mysqli = $db->connect();
$sql = "SELECT user_pwd, user_id,user_name,answer FROM users WHERE user_name = '".mysqli_escape_string($mysqli, $name)."'";
$res = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_row($res);
if ($row == null) {
    $msg = "user name doesn't exist";
    $alert->alert($msg);
} else {
    $db_answer = $row[3];
    $user_id = $row[1];

    if (password_verify($answer, $db_answer)) {
        $pwd=password_hash($pwd, PASSWORD_DEFAULT);
        $key = array('user_pwd'=>$pwd);
        $res = $db->updateById('users', 'user_id', $user_id, $key);
        session_start();
        $_SESSION['user_name'] = $name;
        $_SESSION['user_id'] = $res;
        header("Location:Calender.html");
    } else {
        $msg = "the answer of security question is not correct";
        $alert->alert($msg);
    }
}
