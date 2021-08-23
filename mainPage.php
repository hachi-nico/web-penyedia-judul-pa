<?php

    include_once("db.php");

    $currentDataCount = 8;
    $dataCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM data_pa"));

    $pageCount = ceil($dataCount / $currentDataCount);
    $currentPage = (isset($_GET["p"])) ? $_GET["p"] : 1;
    $firstPage = ($currentDataCount * $currentPage) - $currentDataCount;

    $sql = "SELECT id, topik, judul  FROM data_pa ORDER BY id ASC LIMIT $firstPage, $currentDataCount";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql);

    $filterSql = "SELECT DISTINCT topik FROM data_pa ORDER BY topik ASC";
    $filterResult = mysqli_query($conn, $filterSql);

    if(isset($_POST["search"])) {
        $keyword = $_POST["keyword"];
        $sql = "SELECT id, topik, judul  FROM data_pa
                WHERE topik LIKE '%$keyword%' OR judul LIKE '%$keyword%'
                ORDER BY id ASC LIMIT $firstPage, $currentDataCount";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql);
    }

    if(isset($_GET["filter"])) {
        $keyword = $_GET["data"];
        $sql = "SELECT id, topik, judul  FROM data_pa
                WHERE topik LIKE '%$keyword%'
                ORDER BY topik ASC LIMIT $firstPage, $currentDataCount";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql);
    }


?>
<html>
<head>
    <title>Index</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="dist/images/logo.svg">
</head>
<body class="bg-light">
    <?php include_once('assets/mainPageNavbar.html'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="form-inline" action="" method="get">
                    <div class="input-group">
                        <select class="custom-select" name="data">
                            <?php while($filterData = mysqli_fetch_array($filterResult)) : ?>
                            <option><?= $filterData['topik']; ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <button class="button button-primary ml-sm-2" type="submit" name="filter">Filter</button>
                    <a href="mainPage.php" class="button button-primary ml-sm-2">Reset</a>
                </form>                
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php
                    if(isset($_POST["search"])) {
                        include_once("searchResultLabel.php");
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php while($data2 = mysqli_fetch_array($result2)) : ?>
                    <div class="card mb-2 main-cards">
                        <div class="card-body">
                            <p class="mb-0"><?= $data2["judul"] ?></p>
                            <p class="mb-0">Topik: <?= $data2["topik"] ?></p>
                            <a href="mainPageAbstrak.php?id=<?= $data2["id"]; ?>" class="button button-primary mr-2">
                                Abstrak
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">                
                <div class="table-responsive rounded" style="display: none;">
                    <table class="table table-hover">
                        <thead class="text-white main-page-bg">
                            <tr>
                                <th>Topik</th>
                                <th>Judul</th>
                                <th class="text-center">Abstrak</th>
                            </tr>
                        </thead>
                        <?php while($data = mysqli_fetch_array($result)) : ?>
                        <tbody>
                            <tr>
                                <td class="text-nowrap"><?= $data["topik"]; ?></td>
                                <td class="text-nowrap"><?= $data["judul"]; ?></td>
                                <td class="text-center">
                                    <a href="mainPageAbstrak.php?id=<?= $data["id"]; ?>" class="button button-primary mr-2">
                                        Abstrak
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                        <?php endwhile; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mb-5" >
            <div class="col-12">
                <span>
                        <?php if($currentPage > 1) : ?>
                            <a class="button button-primary" href="?p=<?= $currentPage - 1; ?>">&lt</a>
                        <?php else : ?>
                            <button class="btn button button-primary disabled">&lt</button>
                        <?php endif; ?>
                        <p class="d-inline">Halaman <?= $currentPage . "/" . $pageCount; ?></p>
                        <?php if($currentPage < $pageCount) : ?>
                            <a class="button button-primary" href="?p=<?= $currentPage + 1; ?>">&gt</a>
                        <?php else : ?>
                            <button class="btn button button-primary disabled">&gt</button>
                        <?php endif; ?>
                    </span>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>