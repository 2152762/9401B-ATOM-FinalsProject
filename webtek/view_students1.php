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
                <li><a href="student_page.php">Subjects</a></li>
                <li><a href="student_pending.php">Requests</a></li>
                <li><a href="student_requests.php">Status</a></li>
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
    <a class="h3" href="admin_subjects.php" style="color: #7ed4ff">Back</a>
    <div class="text-center">


        <h2>Students</h2>
    </div>
    <br>
    <br>
    <div class="row justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Course</th>
                <th>ID Number</th>
                <th>Subject</th>
                <th>Slots</th>

            </tr>
            </thead>
            <?php
                $id = $_GET['num'];
                $sql = "SELECT petitions.petition_id As pid, accounts.student_id AS sid, accounts.firstname AS fn,accounts.lastname AS ln, accounts.course AS c,accounts.idno AS idno, subjects.name AS name, subjects.slots FROM `petitions` JOIN subjects ON petitions.subject_id = subjects.subject_id JOIN accounts ON petitions.student_id=accounts.student_id WHERE petitions.status = 'Accepted' AND petitions.subject_id = '$id'";
                $res = $conn->query($sql);

                while ($row = $res->fetch_assoc()){
                    echo "<tr><td>". strtoupper($row['fn']) . " ". strtoupper($row['ln']) ."</td>";
                    echo "<td>". strtoupper($row['c']) ."</td>";
                    echo "<td>". strtoupper($row['idno']) ."</td>";
                    echo "<td>". strtoupper($row['name']) ."</td>";
                    echo "<td>". strtoupper($row['slots']) ."</td></tr>";
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
    <br>
    <br>
    <br>

</div>
</body>
</html>