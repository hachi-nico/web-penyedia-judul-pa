<?php

    include_once("db.php");

    $sql = "SELECT * FROM data_pa ORDER BY id ASC";    
    $result = mysqli_query($conn, $sql);    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include_once("vendor/bootstrap/bootstrapCss.html"); ?>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php include_once("vendor/navbar.html"); ?>    
<div class="container">    
<?php while($data = mysqli_fetch_array($result)) : ?>
    <div class="row">
        <div class="col-md">
            <div class="card mt-5">
                <div class="card-header bg-primary text-white">
                    <h5 class="font-weight-bold"><?= $data['judul']; ?></h5>
                </div>
                <div class="card-body">
                    <p>topik: <?= $data['topik']; ?></p>
                    <a href="#" class="card-link">selengkapnya >></a>                
                </div>
            </div>
        </div>        
    </div>
<?php endwhile; ?>
</div>
<?php include_once("vendor/bootstrap/bootstrapJs.html"); ?>
</body>
</html>