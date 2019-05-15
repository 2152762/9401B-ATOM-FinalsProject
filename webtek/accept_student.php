<?php
session_start();
require 'db.php';
$id = $_GET['num'];
$pid = $_GET['pid'];

$sql = "SELECT slots FROM subjects WHERE subject_id = '$id'";
$r = $conn->query($sql);
$rr = $r->fetch_row();

$slots = $rr[0] - 1;
$sql2 = "UPDATE subjects SET slots = '$slots' WHERE subject_id = '$id'";
$conn->query($sql2);

$sql3 = "UPDATE petitions SET status = 'Accepted' WHERE petition_id = '$pid'";
$conn->query($sql3);

if ($conn->query($sql3) === TRUE) {
    $m = "Accepted!";
    echo "
            <script type = 'text/javascript'>
                alert('$m');
                window.location.replace('admin_requests.php');
            </script>";
} else {
    die($conn->error);
}
