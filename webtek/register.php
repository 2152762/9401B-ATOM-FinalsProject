<?php
require 'db.php';
session_start();

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$idno = $_POST['idno'];
$course = $_POST['course'];
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO accounts(firstname, lastname, username, type, password, idno, course) 
            VALUES('$firstname','$lastname','$username','student','$password','$idno','$course')";
if ($conn->query($sql) === TRUE) {
    $m = "Registration successful!";
    echo "
            <script type = 'text/javascript'>
                alert('$m');
                window.location.replace('index.php');
            </script>";
} else {
    die($conn->error);
}
