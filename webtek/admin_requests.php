<?php
session_start();
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Form Petition</title>
    <!--    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>
<body>
<div class="container">
    <br>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="admin_requests.php">SAMCIS Petition</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="admin_requests.php">Requests</a></li>
                <li><a href="admin_subjects.php">Subjects</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">
                        <?php
                        echo strtoupper($_SESSION['firstname']);
                        ?></a>
                </li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
    <hr>
    <br>
    <div class="text-center">
        <h2>Pending Requests</h2>
    </div>
    <br>
    <br>

    <div class="row justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th>Student</th>
                <th>Subject</th>
                <th>Slots</th>
                <th colspan="2">Action</th>

            </tr>
            </thead>
            <?php
            $id = $_SESSION['idno'];
            $sql = "SELECT petitions.subject_id AS id, petitions.petition_id AS pid,accounts.firstname AS fn, accounts.lastname AS ln,subjects.name AS name, subjects.slots AS slots, subjects.status AS status FROM petitions JOIN accounts ON petitions.student_id=accounts.student_id JOIN subjects ON petitions.subject_id=subjects.subject_id WHERE petitions.status = 'Pending'";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . strtoupper($row['fn']) . " " . strtoupper($row['ln']) . "</td>";
                echo "<td>" . $row['name'] ."</td>";
                echo "<td>" . $row['slots'] ."</td>";
                echo " <td>
                        <a href='accept_student.php?num=" . $row['id'] ."&pid=" . $row['pid'] .  "' class='btn btn-info'>Accept</a>
                        <a href='decline_student.php?num=" . $row['id'] .  "' class='btn btn-danger'>Decline</a>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

</div>
</body>
</html>