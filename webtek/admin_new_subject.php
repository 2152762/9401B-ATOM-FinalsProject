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
                <li><a href="#">Page 2</a></li>
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


        <h2>Add new Subject</h2>
    </div>
    <br>
    <br>
    <form action="add_subject.php" method="post">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                <tr>
                    <th>Subject</th>
                    <th>Slots</th>
                    <th>Minimum</th>
                    <th>Status</th>

                </tr>
                </thead>
                <td><input type="text" class="form-control" name="name" placeholder="Subject Name"></td>
                <td><input type="number" class="form-control" name="slots" placeholder="Slots"></td>
                <td><input type="number" class="form-control" name="minimum" placeholder="Minimum Student"></td>
                <td><select class="form-control" name="status">
                        <option>Enabled</option>
                        <option>Disabled</option>
                    </select> </td>


            </table>
        </div>
        <br>
        <br>
        <br>
        <div class="row text-centert">
            <div class="col-md-12 text-center">
                <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-info" >Add</button>
                </div>
            </div>
        </div>
    </form>


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