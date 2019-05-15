<?php
session_start();
require 'db.php';
$id = $_GET['num'];

$sql = "UPDATE subjects SET status='Disabled' WHERE subject_id = '$id'";
if ($conn->query($sql) === TRUE) {
    $m = "Disabled!";
    echo "
            <script type = 'text/javascript'>
                alert('$m');
                window.location.replace('admin_subjects.php');
            </script>";
} else {
    die($conn->error);
}
