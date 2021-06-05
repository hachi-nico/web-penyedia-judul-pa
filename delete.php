<?php

	include_once("db.php");
	
	$id = $_GET['id'];
	$sql = "DELETE FROM data_pa WHERE id=$id";

	$result = mysqli_query($conn, $sql);
	
	if($result) {  
		echo("<script>
					alert('berhasil menghapus data');
					document.location.href = 'index.php';
				</script>");
	} else {	           
		echo("<script>
					alert('gagal menghapus data');
					document.location.href = 'index.php';
				</script>");
	}

?>