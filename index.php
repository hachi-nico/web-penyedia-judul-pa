<?php

    include_once("db.php");

    $sql = "SELECT * FROM data_pa ORDER BY id ASC";    
    $result = mysqli_query($conn, $sql);    

?>
 
<html>
<head>    
    <title>Index</title>    
    <?php include_once("assets/bootstrap/bootstrapCss.html"); ?>
</head>
<body class="bg-primary">
    <?php include_once("assets/navbar.html"); ?>    
    <div class="container bg-primary mt-3">
        <div class="card mb-5">
            <div class="card-body">
                <h1 class="text-center">Panel Admin</h1>
                <a href="create.php">
                    <button class="btn btn-primary mb-3">
                        Tambah data
                    </button>
                </a><br>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Topik</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Abstrak</th>
                                <th scope="col" class="text-center">Aksi</th> 
                            </tr>
                        </thead>                    
                        <?php $i = 1; ?>
                        <?php while($data = mysqli_fetch_array($result)) : ?>
                        <tbody>
                            <tr>                                
                                <td scope="row"><?= $i; ?></td>                                
                                <td><?= $data['topik']; ?></td>
                                <td><?= $data['judul']; ?></td>
                                <td><?= $data['abstrak']; ?></td>            
                                <td class="text-center">
                                    <div class="d-flex">
                                        <a href="update.php?id=<?= $data['id']; ?>" class="btn btn-primary">
                                            Edit
                                        </a>
                                        &nbsp &nbsp
                                        <a href="delete.php?id=<?= $data['id']; ?>" class="btn btn-primary">
                                            Hapus
                                        </a>
                                    </div>                            
                                </td>
                            </tr>                            
                        </tbody>
                        <?php $i++; ?>
                        <?php endwhile; ?>
                    </table>                    
                </div>
            </div>
        </div>                
    </div>    
    <?php include_once("assets/bootstrap/bootstrapJs.html"); ?>
</body>
</html>