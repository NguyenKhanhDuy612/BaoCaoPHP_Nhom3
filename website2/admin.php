<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>THÔNG TIN SẢN PHẨM</title>
    <!-- <link rel="stylesheet" href="../exercise/xu_ly_san_pham/vendor/bootstrap.css"> -->

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


</head>

<body>



    <?php
    include('./include/connect.php');

    include('./include/header.php');
    ?>
    <div class="container">
        <?php
        $rowsPerPage = 3; //số mẩu tin trên mỗi trang, giả sử là 10 
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        $offset = ($_GET['page'] - 1) * $rowsPerPage;
        // $sql="SELECT MASP,MALSP,TENSP,DVT,GioiTinh,KICHTHUOC,DONGIA,MANCC,SLTON,CHITIETSP from  SANPHAM LIMIT ";
        $sql = "SELECT MASP,TENSP,KICHTHUOC,DONGIA,nhacc.TENNCC,SLTON 
					from  SANPHAM JOIN nhacc LIMIT ";
        // $result = mysqli_query($conn, $sql);
        // if (!empty($_GET['keyword']))
        // {
        //     $search = $_GET['keyword'];
        //     // $sql="SELECT MASP,MALSP,TENSP,DVT,GioiTinh,KICHTHUOC,DONGIA,MANCC,SLTON,CHITIETSP from  SANPHAM LIMIT ";
        //     $sql="SELECT MASP,TENSP from  SANPHAM LIMIT ";

        //     // $sql="SELECT MaNV,Ho,Ten,NgaySinh,GioiTinh,DiaChi,Anh,loainv.TenLoaiNV,phongban.TenPhongBan from nhanvien JOIN loainv JOIN phongban WHERE nhanvien.MaLoaiNV = loainv.MaLoaiNV and nhanvien.MaPhongBan = phongban.MaPhongBan and Ten like '%$search%'";                           
        // }
        $result = mysqli_query($abc, $sql . $offset . ', ' . $rowsPerPage);
        echo "<p class='title' align='center'><font size='15'> THÔNG TIN SẢN PHẨM</font></P>";
        // echo '<h1>Xin chào: '.$login_session.'</h1>';
        // echo '<h2><a href = "logout.php">Sign Out</a></h2>';

        echo '<div class = "navbar add_search">';
        echo '<div class="add_search-them" type="text" class=""><a href="addproduct.php"><h4> Thêm sản phẩm</h4></a></div>';
        echo '<form class="add_search-tim" action="admin.php" method="get">
		    <input class="rounded-pill" name="keyword" placeholder="" value="">
		    <input class="btn btn-success rounded-pill " type="submit" value="Tìm kiếm">
			</form>';
        echo '</div>';

        echo "<table class='table '>";
        echo '<thead><tr class="bg-warning"> 
				<th>STT</th> 
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Kích thước</th> 
				<th>Đơn giá</th> 
				<th>Nhà cung cấp</th> 
				<th>Số lượng</th>
				<th>Sửa</th>
				<th>Xóa</th>
				
			</tr></thead>';
        if (mysqli_num_rows($result) <> 0) {
            $stt = 1;
            while ($rows = mysqli_fetch_row($result)) {
                echo "<tbody><tr class='bg-white'>";
                echo "<td>$stt</td>";
                echo "<td>$rows[0]</td>";
                echo "<td>$rows[1]</td>";
                echo "<td>$rows[2]</td>";
                echo "<td>" . $rows[3] = number_format($rows[3], 0, ',', '.') . " VND" . "</td>";
                echo "<td>$rows[4]</td>";
                echo "<td>$rows[5]</td>";
                // echo "<td>$rows[6]</td>"; 
                // // echo "<td><img width='30px' src='images/$rows[6]'></td>"; 
                // echo "<td>$rows[7]</td>";
                // echo "<td>$rows[8]</td>";
                echo "<td><a href='editproduct.php?id=$rows[0]'><img src='./img/sua.png' width='25px' ></td>";
                echo "<td><a onclick='return confirm(`You có muốn xóa không?`)' href='deleteproduct.php?id=$rows[0]'><img src='./img/xoa.jpg' width='25px' ></td>";
                echo "</tr></tbody>";
                $stt += 1;
            } //while
        }
        echo "</table>";



        $re = mysqli_query($abc, 'select * from sanpham');
        //tổng số mẩu tin cần hiển thị 
        $numRows = mysqli_num_rows($re);
        //tổng số trang
        $maxPage = floor($numRows / $rowsPerPage) + 1;
        echo "<div id='phantrang' class='' align='center'>";
        //Gắn thêm nút back
        if ($_GET['page'] > 1) {
            echo "<div>";
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "> Back </a> ";
        }
        //tạo link tương ứng tới các trang 
        for ($i = 1; $i <= $maxPage; $i++) {
            if ($i == $_GET['page']) {
                echo '<b>Trang' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
            } else
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">Trang" . $i . "</a> ";
        }
        //Nút next
        if ($_GET['page'] < $maxPage) {
            echo "<a href = " . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "> Next </a>";
            echo "</div>";
        }
        echo "</div>";
        ?>

    </div>
    </div>

</body>

</html>

<?php
include('./include/footer.html');
?>