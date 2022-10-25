<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài tập</title>
</head>
<body>
<?php $page_title = 'Register'; include('includes/header.html');?>

<ul class="top-level-menu">
    <li><a href="#">Bài tập Mảng</a>
	<ul class="second-level-menu">
            <li><a href="./code/array/B6_Timkiem.php">Tìm kiếm trong mảng</a></li>
            <li><a href="./code/array/B7_Thaythe.php">Thay thế phần tử</a></li>
            <li><a href="./code/array/B9_Ghepmang.php">Ghép mảng</a></li>
			<li><a href="./code/array/Matran.php">Ma trận số nguyên</a></li>
			<li><a href="./code/array/B4_Tongdayso.php">Tổng dãy số</a></li>
            <li><a href="./code/array/B5_Sinhmang.php">Min max trong mảng</a></li>
        </ul></li>
    <li><a href="#">Bài tập Form</a>
	<ul class="second-level-menu">
            <li><a href="./code/form/tinhtiendien.php">Tính tiền điện</a></li>
            <li><a href="./code/form/pheptinh.php">Tính toán 2 số</a></li>
            <li><a href="./code/form/dientichhcn.php">Diện tích hình chữ nhật</a></li>
        </ul>
	</li>
    <li>
        <a href="#">Bài tập MySQL</a>
        <ul class="second-level-menu">
            <li><a href="./code/mysql/B2_Thongtinkhachhang.php">Thông tin khách hàng</a></li>
            <li><a href="./code//mysql//B1_Thongtinhangsua.php">Thông tin hãng sữa</a></li>
            <li>
                <a href="#">Thông tin sữa</a>
                <ul class="third-level-menu">
                    <li><a href="./code/mysql/B7_Sanpham.php">Thông tin sản phẩm</a></li>
                    <li><a href="./code/mysql/B8_Chitietsanphamcophantrang.php">Chi tiết sản phẩm 2</a></li>
                    <li><a href="./code/mysql/B5_Thongtinsua2.php">Thông tin sản phẩm 2</a></li>
                </ul>
            </li>
            <li><a href="#">Tìm kiếm</a>
			<ul class="third-level-menu">
                    <li><a href="./code/mysql/B9_Timkiemsua.php">Tìm kiếm sữa</a></li>
                    <li><a href="./code/mysql/B10_Timkiemnangcao.php">Tìm kiếm sữa 2</a></li>
                    
                </ul></li>

        </ul>
    </li>
	<li><a href="#">Bài tập OOP</a>
	<ul class="second-level-menu">
            <li><a href="./code/oop/B2_QuanlyNV.php">Quản lí nhân viên</a></li>
            <li><a href="./code/oop/B4_Chuvi.php">Tính chu vi</a></li>
        </ul>
	</li>
    <li><a href="#">Bài tập File</a></li>
</ul>

	<center>
		<img src="./images/bg.jpg" width="750px"  alt="">
	</center>

<?php include('includes/footer.html'); ?>
</body>
</html>