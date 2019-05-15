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
                <a class="navbar-brand" href="student_page.php">SAMCIS Petition</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="student_page.php">Subjects</a></li>
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
    <div class="text-center">
        <h2>Available Subjects</h2>
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
                <th colspan="2">Action</th>

            </tr>
            </thead>
            <?php
            $id = $_SESSION['idno'];
            $sql = "SELECT * FROM subjects WHERE status = 'Enabled'";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
                $si = $row['subject_id'];
                $sql2 = "SELECT * FROM petitions WHERE (status = 'Accepted' OR status = 'Pending') AND subject_id = '$si' AND student_id = '$id'";
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['minimum'] . "</td>";
                echo "<td>" . $row['slots'] . "</td>";
                echo "  <td>
                        <a href='view_students1.php?num=" . $row['subject_id'] .  "' class='btn btn-info'>View Students</a>&nbsp;";
                if($conn->query($sql2)->num_rows > 0){

                }else{
                    echo "<a href='join_subject.php?num=" . $row['subject_id'] . "&idno=" . $id . "' class='btn btn-success'>Join</a>";
                }


                    echo "</td>
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