<?php
require 'Dbm.php';
header("Content-Type: application/json");

$name=htmlentities($_POST['username']);
$pwd=htmlentities($_POST['pwd']);
//open the file and testify the username and pwd$pwd=password_hash($pwd,PASSWORD_DEFAULT);


    $db = new Database();
    $mysqli = $db->connect();
    $sql = "SELECT user_pwd, user_id,user_name FROM users WHERE user_name = '".mysqli_escape_string($mysqli, $name)."'";
    $res = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_row($res);
        $id = $row[1];
        $db_pwd = $row[0];

if (password_verify($pwd, $db_pwd)) {
    session_start();
    $_SESSION['user_id']= $id;
    $_SESSION['user_name']=$name;
    $_SESSION['token'] = substr(md5(rand()), 0, 10);

 
    echo json_encode(array(
        "success" => true,
        "user_id" => $id
    ));
    exit;
} else {
    echo json_encode(array(
        "success" => false,
        "message" => "Incorrect Username or Password"
    ));
    exit;
}
