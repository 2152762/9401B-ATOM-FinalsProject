<!DOCTYPE html>
<html>
<head>
  
    <title>Form Petition</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
    
</head>
<body>
<a href="petition.php" type="button" class="btn btn-secondary">PETITION LIST </a>
    <?php require_once 'process.php'; ?>
    <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>ID Number</label>
                <input type="text" name="idno" class="form-control" placeholder="Enter Your ID Number">
            </div>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <label>Course & Year</label>
                <input type="text" name="course" class="form-control" placeholder="Enter Your Course & Year">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" name="save">Submit</button>
            </div>
         </form>
    </div>
    </div>
</body>
</html>