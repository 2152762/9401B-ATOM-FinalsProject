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
                <li><a href="admin_requests.php">Requests</a></li>
                <li class="active"><a href="admin_subjects.php">Subjects</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">
                        <?php
                        echo strtoupper($_SESSION['firstname']);
                        ?>
                    </a>
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
                <th>Slots</th>
                <th>Minimum</th>
                <th>Status</th>
                <th colspan="2">Action</th>

            </tr>
            </thead>
            <?php
            $id = $_SESSION['idno'];
            $sql = "SELECT * FROM subjects";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name']  ."</td>";
                echo "<td>" . $row['slots']  ."</td>";
                echo "<td>" . $row['minimum']  ."</td>";
                echo "<td>" . $row['status']  ."</td>";
                echo "  <td>
                        <a href='view_students.php?num=" . $row['subject_id'] .  "' class='btn btn-info'>View Students</a>&nbsp";

                if($row['status'] =='Enabled'){
                    echo "<a href='disable_subject.php?num=" . $row['subject_id'] .  "' class='btn btn-danger'>Disable</a>&nbsp";
                }else{
                    echo "<a href='enable_subject.php?num=" . $row['subject_id'] .  "' class='btn btn-success'>Enable</a>&nbsp";
                }
                echo "<a href='delete_subject.php?num=" . $row['subject_id'] .  "' class='btn btn-danger'>Delete</a>
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
    <div class="row text-centert">
        <div class="col-md-12 text-center">
            <div class="form-group">
                <a href="admin_new_subject.php" class="btn btn-lg btn-success" >Add New Subject</a>
            </div>
        </div>
    </div>
    </div>

</div>
</body>
</html>