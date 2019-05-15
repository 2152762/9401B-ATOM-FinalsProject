<?php
require 'db.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT student_id, type, firstname FROM accounts WHERE username = '$username' AND password = '$password'";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    $r = $res->fetch_row();
    if($r[1] == 'admin'){
        $_SESSION['idno'] = $r[0];
        $_SESSION['firstname'] = $r[2];
        header('Location: admin_requests.php');
    }else{
        $_SESSION['idno'] = $r[0];
        $_SESSION['firstname'] = $r[2];
        header('Location: student_page.php');
    }

} else {
    echo "0 results";
}