<?php

session_start();

$mysqli = new mysqli('localhost', 'root','', 'petition') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$idno = '';
$name = '';
$course = '';

if (isset($_POST['save'])){
    $idno = $_POST['idno'];
    $name = $_POST['name'];
    $course = $_POST['course'];

    $mysqli->query("INSERT INTO data (idno, name, course) VALUES('$idno','$name','$course')") or 
    die($mysqli->error);

    $_SESSION['message'] = "Petition has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: register.php");
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error()); 

    $_SESSION['message'] = "Petition has been deleted!";
    $_SESSION['msg_type'] = "danger";
 
    header("location: petition.php");
}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $idno = $row['idno'];
        $name = $row['name'];
        $course = $row['course'];    
    }
}

if (isset($_POST['update'])){
    $id = $_POST['id'];
    $idno = $_POST['idno'];
    $name = $_POST['name'];
    $course = $_POST['course'];

    $mysqli->query("UPDATE data SET idno='$idno', name='$name', course='$course' WHERE id=$id") or 
    die($mysqli->error());

    $_SESSION['message'] = "Petition has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: petition.php');
}