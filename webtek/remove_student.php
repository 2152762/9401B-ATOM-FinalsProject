<?php
session_start();
require 'db.php';
$id = $_GET['num'];

$sid = $_GET['sid'];

$sql = "SELECT slots FROM subjects WHERE subject_id = '$sid'";
$r = $conn->query($sql);
$rr = $r->fetch_row();

$slots = $rr[0] + 1;
$sql2 = "UPDATE subjects SET slots = '$slots' WHERE subject_id = '$sid'";
$conn->query($sql2);


$sql = "UPDATE petitions SET status = 'Canceled' WHERE petition_id = '$id'";
if ($conn->query($sql) === TRUE) {
    $m = "Removed Student!";
    echo "
            <script type = 'text/javascript'>
                alert('$m');
                window.location.replace('admin_subjects.php');
            </script>";
} else {
    die($conn->error);
}
