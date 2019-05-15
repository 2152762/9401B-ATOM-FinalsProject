<?php
session_start();
require 'db.php';
$id = $_GET['num'];

$sql = "DELETE";
if ($conn->query($sql) === TRUE) {
    $m = "Deleted!";
    echo "
            <script type = 'text/javascript'>
                alert('$m');
                window.location.replace('admin_subjects.php');
            </script>";
} else {
    die($conn->error);
}
