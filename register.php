<?php

    include_once("db.php");

    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (nama, password) VALUES ('$nama', '$password')";
        $result = mysqli_query($conn, $sql);

        if($result) {            
            echo("<script>
				alert('berhasil');
				document.location.href = 'index.php';
			  	</script>");
        } else {            
            echo("<script>
				alert('gagal');				
			  	</script>" . mysqli_error($conn));
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>user</p>
        <input type="text" name="nama">
        <p>password</p>
        <input type="password" name="password">
        <button type="submit" name="submit">register</button>
    </form>
</body>
</html>