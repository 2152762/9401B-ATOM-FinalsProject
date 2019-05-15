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

                <li class="active"><a href="student_pending.php">Status</a></li>
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
        <h2>History</h2>
    </div>
    <br>
    <br>

    <div class="row justify-content-center">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Minimum</th>
                <th>Slots</th>
                <th>Subject</th>
                <th>Request Status</th>
                <th colspan="2">Action</th>

            </tr>
            </thead>
            <?php
            $id = $_SESSION['idno'];
            $sql = "SELECT subjects.name AS name, petitions.subject_id AS si, petitions.petition_id AS pid, accounts.firstname AS fn, accounts.lastname AS ln, subjects.minimum AS mini, subjects.slots AS slots, petitions.status AS status FROM petitions JOIN subjects ON petitions.subject_id = subjects.subject_id JOIN accounts ON petitions.student_id = accounts.student_id WHERE petitions.status !='Pending' AND accounts.student_id = '$id'";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . strtoupper($row['fn']) . " " . strtoupper($row['ln']) . "</td>";
                echo "<td>" . $row['mini'] . "</td>";
                echo "<td>" .  $row['slots'] . "</td>";
                echo "<td>" .  $row['name'] . "</td>";
                echo "<td>" .  $row['status'] . "</td>";
                echo "  <td>
                        <a href='view_students1.php?num=" . $row['si'] .  "' class='btn btn-info'>View Students</a>&nbsp;";
                if($row['status'] == 'Canceled'){
                }else{
                    echo "<a href='leave_subject.php?num=" . $row['si'] . "&pid=" . $row['pid'] . "' class='btn btn-danger'>Leave</a>";
                }

                  echo "  </td>
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