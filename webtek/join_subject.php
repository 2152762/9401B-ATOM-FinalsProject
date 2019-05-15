<?php
session_start();
require 'db.php';
$id = $_GET['num'];
$idno = $_GET['idno'];

$sql = "INSERT INTO petitions(subject_id, student_id, status) VALUES('$id','$idno','Pending')";
if ($conn->query($sql) === TRUE) {
    $m = "Request Sent!";
    echo "
            <script type = 'text/javascript'>
                alert('$m');
                window.location.replace('student_page.php');
            </script>";
} else {
    die($conn->error);
}
