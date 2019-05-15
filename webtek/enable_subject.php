<?php
session_start();
require 'db.php';
$id = $_GET['num'];

$sql = "UPDATE subjects SET status='Enabled' WHERE subject_id = '$id'";
if ($conn->query($sql) === TRUE) {
    $m = "Enabled!";
    echo "
            <script type = 'text/javascript'>
                alert('$m');
                window.location.replace('admin_subjects.php');
            </script>";
} else {
    die($conn->error);
}
