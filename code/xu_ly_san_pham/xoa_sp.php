<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Xóa Sản Phẩm</title>
	<style type="text/css">
		#mess{
			background-color: #49bd90;
			height: 30px;
		}
		#xoatc{
			color: white;
			text-align: center;
			padding: 8px;
		}
	</style>
</head>
<body>
	<?php
		include_once('./connect.php');
		if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
		$id=$_GET['id'];
		$sql = "DELETE FROM sanpham WHERE MASP='$id'";
		if ($abc->query($sql) === TRUE) {
		echo "<div id='mess'><h5 id='xoatc'>Xoá thành công!</h5></div>";
		include('index_nhanvien.php');
		} else {
		echo "Error updating record: " . $abc->error;
		}

		$abc->close();
		}
	?>
	<a href="javascript:window.history.back(-1);">Quay lại</a>
</body>
</html>