<?php

	include_once("db.php");
	include_once("sessionControl.php");

	$id = $_GET["id"];
	$sql = "DELETE FROM data_pa WHERE id=$id";

	$result = mysqli_query($conn, $sql);

	if($result) {
		echo "
			<script>
				alert('Data berhasil dihapus');
				document.location.href = 'admin.php';
			</script>";
	} else {
		echo "
			<script>
				alert('Terjadi kesalahan server');
				document.location.href = 'admin.php';
			</script>";
	}

?>