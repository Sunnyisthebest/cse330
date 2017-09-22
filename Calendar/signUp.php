<?php

require 'Dbm.php';
header("Content-Type: application/json");
$db = new Database();
$name=htmlentities($_POST['username']);
$pwd=htmlentities($_POST['pwd']);
$answer = htmlentities($_POST['answer']);
$pwd=password_hash($pwd, PASSWORD_DEFAULT);
$answer=password_hash($answer, PASSWORD_DEFAULT);
//open the file and testify the username and pwd
$fields = array('user_name','user_pwd','answer');
$values = array($name,$pwd,$answer);
$res = $db->insertRow($fields, $values, 'users');

if ($res!==false) {
    session_start();
    $_SESSION['user_name'] = $name;
    $_SESSION['token'] = substr(md5(rand()), 0, 10);
    $_SESSION['user_id'] = $res;
 
    echo json_encode(array(
        "success" => true,
        "user_id" => $res
    ));
    exit;
} else {
    echo json_encode(array(
        "success" => false,
        "message" => "Sign up failed"
    ));
    exit;
}
