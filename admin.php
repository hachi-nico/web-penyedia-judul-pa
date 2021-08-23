<?php

    include_once("db.php");
    include_once("sessionControl.php");

    $currentDataCount = 6;
    $dataCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM data_pa"));

    $pageCount = ceil($dataCount / $currentDataCount);
    $currentPage = (isset($_GET["p"])) ? $_GET["p"] : 1;
    $firstPage = ($currentDataCount * $currentPage) - $currentDataCount;

    $sql = "SELECT id, topik, judul  FROM data_pa ORDER BY id ASC LIMIT $firstPage, $currentDataCount";
    $result = mysqli_query($conn, $sql);

    $filterSql = "SELECT DISTINCT topik FROM data_pa ORDER BY topik ASC";
    $filterResult = mysqli_query($conn, $filterSql);

    if(isset($_POST["search"])) {
        $keyword = $_POST["keyword"];
        $sql = "SELECT id, topik, judul  FROM data_pa
                WHERE topik LIKE '%$keyword%' OR judul LIKE '%$keyword%'
                ORDER BY id ASC LIMIT $firstPage, $currentDataCount";
        $result = mysqli_query($conn, $sql);
    }

    if(isset($_GET["filter"])) {
        $keyword = $_GET["data"];
        $sql = "SELECT id, topik, judul  FROM data_pa
                WHERE topik LIKE '%$keyword%'
                ORDER BY topik ASC LIMIT $firstPage, $currentDataCount";
        $result = mysqli_query($conn, $sql);
    }

?>
<html>
<head>
    <title>Index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="dist/images/logo.svg">
</head>
<body class="bg-light">
    <?php include_once('assets/navbar.html'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9 mb-5">
                <div class="table-responsive rounded">
                    <table class="table table-hover">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Topik</th>
                                <th>Judul</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <?php while($data = mysqli_fetch_array($result)) : ?>
                            <tbody>
                                <tr>
                                    <td class="text-nowrap"><?= $data["topik"]; ?></td>
                                    <td class="text-nowrap"><?= $data["judul"]; ?></td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            <a href="update.php?id=<?= $data["id"]; ?>" class="btn btn-info mr-2">
                                                Edit
                                            </a>
                                            <a href="delete.php?id=<?= $data["id"]; ?>" class="btn btn-danger mr-2" onclick="return confirm('Konfirmasi penghapusan data');">
                                                Hapus
                                            </a>
                                            <a href="abstrak.php?id=<?= $data["id"]; ?>" class="btn btn-info mr-2">
                                                Abstrak
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endwhile; ?>
                    </table>
                    <span>
                        <?php if($currentPage > 1) : ?>
                            <a class="btn btn-info" href="?p=<?= $currentPage - 1; ?>">&lt</a>
                        <?php else : ?>
                            <button class="btn btn-info disabled">&lt</button>
                        <?php endif; ?>
                        <p class="d-inline">Halaman <?= $currentPage . "/" . $pageCount; ?></p>
                        <?php if($currentPage < $pageCount) : ?>
                            <a class="btn btn-info" href="?p=<?= $currentPage + 1; ?>">&gt</a>
                        <?php else : ?>
                            <button class="btn btn-info disabled">&gt</button>
                        <?php endif; ?>
                    </span>
                </div>
            </div>
            <div class="col-md-3 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Cari data</h5>
                        <form action="" method="post">
                            <input class="form-control mb-2" type="search" name="keyword">
                            <button class="btn btn-info btn-block mt-2" type="submit" name="search">Cari</button>
                        </form>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-title">Filter Data Berdasarkan Topik</h5>
                        <form action="" method="get">
                            <div class="input-group">
                                <select class="custom-select" name="data">
                                    <?php while($filterData = mysqli_fetch_array($filterResult)) : ?>
                                    <option><?= $filterData['topik']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <button class="btn btn-info btn-block mt-2" type="submit" name="filter">Filter</button>
                        </form>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        <h5 class="card-title">Statistik</h5>
                        <p class="card-text">Total data: <?= $dataCount; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>