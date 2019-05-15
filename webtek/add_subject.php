<?php
require 'db.php';
session_start();

$name = $_POST['name'];
$slots = $_POST['slots'];
$minimum = $_POST['minimum'];
$status = $_POST['status'];

$sql = "INSERT INTO subjects(name, slots, minimum, status) VALUES('$name','$slots','$minimum','$status')";
if ($conn->query($sql) === TRUE) {
    $m = "Added New Subject";
    echo "
            <script type = 'text/javascript'>
                alert('$m');
                window.location.replace('admin_subjects.php');
            </script>";
} else {
    die($conn->error);
}
