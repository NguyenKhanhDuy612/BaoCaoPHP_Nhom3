<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Xóa Sản Phẩm</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
	
    <?php require('./include/header.php'); ?>
	<div class="container">
	<?php
	 include('./include/connect.php');
	
	if (isset($_REQUEST['id']) and $_REQUEST['id'] != "") {
		$id = $_GET['id'];
		$sql = "DELETE FROM sanpham WHERE MASP='$id'";
		if ($abc->query($sql) === TRUE) {
			echo '<div class="alert alert-success"><strong>Thành công!</strong> Một sản phẩm đã được xoá.</div>';
		} else {
			echo "Error updating record: " . $abc->error;
		}

		$abc->close();
	}
	?>

	<center><a href="admin.php"><input class="rounded-pill mb-3  btn btn-primary mt-5" type="button" value="Trở về"></a></center>
	</div>
</body>

</html>
<?php include('./include/footer.html');?>