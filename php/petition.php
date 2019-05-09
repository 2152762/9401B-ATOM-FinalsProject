<!DOCTYPE html>
<html>
<head>
  
    <title>Form Petition</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    
</head>
<body>
<a href="register.php" type="button" class="btn btn-secondary">REGISTRATION </a>
    <?php require_once 'process.php'; ?>
    <?php 
    
    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    ?>
    </div>
   <?php endif ?>
    <div class="container">
    <?php
        $mysqli = new mysqli('localhost', 'root','', 'petition') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
        //pre_r($result);
        ?>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Number</th>
                        <th>Name</th>
                        <th>Coure & Year</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
    <?php
        while ($row = $result->fetch_assoc()):?>
            <tr>
                <td><?php echo $row['idno']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['course']?></td>
                <td>
                <a href="petition.php?edit=<?php echo $row['id']; ?>"
                   class="btn btn-info">Edit</a>
                <a href="petition.php?delete=<?php echo $row['id']; ?>"
                   class="btn btn-danger">Delete</a>
                </td>
            </tr>
    <?php endwhile; ?>
        </table>
        </div>
      <?php
        function pre_r( $array ){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
    ?>
    <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>ID Number</label>
                <input type="text" name="idno" class="form-control" 
                value="<?php echo $idno; ?>" placeholder="Enter Your ID Number">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" 
                value="<?php echo $name; ?>" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <label>Course & Year</label>
                <input type="text" name="course" class="form-control" 
                value="<?php echo $course; ?>" placeholder="Enter Your Course & Year">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info" name="update">Update</button>
            </div>
         </form>
    </div>
    </div>
</body>
</html>