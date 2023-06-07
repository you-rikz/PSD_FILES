<?php
include "Retrieve.php";

$success = $_GET['success'] ?? null;
$error = $_GET['error'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <style>
        .header{
            padding-left:450px;
            padding-top:50px;
        }
    </style>
    <title>PDC10 Registrations</title>
</head>
<body>
    <?php if (!is_null($success)): ?>
        <div class="alert alert-success" role="alert">
            Your registration has been saved
        </div>
        <?php endif ?>

        <?php if (!is_null($error)): ?>
        <div class="alert alert-danger" role="alert">
            Unable to upload your file. Please insert an image type file.
        </div>
    <?php endif ?>
    <div class="container">
        <div class="row">
            <div class="col-9"><h1>Registrations</h1></div>
            <div class="col-3">
                <form method="POST" action="register.php">
                    <button class="btn btn-primary" style="margin-top:10px;">Add New Registration</button>
                </form>
            </div> 
        </div>
    </div>
    <div class="container">
    <table class="table table-striped">
        <thead>
            <tr class="table-dark">
            <th scope="col">ID</th>
            <th scope="col">Complete Name</th>
            <th scope="col">Email</th>
            <th scope="col">Picture</th>
            <th scope="col">Registered Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $retrieve = new Retrieve;
            $retrieveData = $retrieve->retrieveData();
            foreach($retrieveData as $data){
        ?>
            <tr>
            <th scope="row"><?php echo $data['id']?></th>
            <td><?php echo $data['complete_name']?></td>
            <td><?php echo $data['email']?></td>
            <td><?php echo "<img width=100px;height=100px; src=" . $data['picture_path'] . ">";?></td>
            <td><?php echo $data['registered_at']?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>