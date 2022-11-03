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
        $rowsPerPage = 5; 
        if (!isset($_GET['page'])) {
            $_GET['page'] = 1;
        }
        $offset = ($_GET['page'] - 1) * $rowsPerPage;
        $sql = "SELECT MASP,TENSP,KICHTHUOC,DONGIA,nhacc.TENNCC,SLTON 
					from  SANPHAM JOIN nhacc LIMIT ";
     
        $result = mysqli_query($abc, $sql . $offset . ', ' . $rowsPerPage);
        echo "<p class='title' align='center'><font size='15'> THÔNG TIN SẢN PHẨM</font></P>";
       
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
             
                echo "<td><a href='editproduct.php?id=$rows[0]'><img src='./img/sua.png' width='25px' ></td>";
                echo "<td><a onclick='return confirm(`You có muốn xóa không?`)' href='deleteproduct.php?id=$rows[0]'><img src='./img/xoa.jpg' width='25px' ></td>";
                echo "</tr></tbody>";
                $stt += 1;
            } 
        }
        echo "</table>";



        $re = mysqli_query($abc, 'select * from sanpham');
       
        $numRows = mysqli_num_rows($re);
      
        $maxPage = floor($numRows / $rowsPerPage) + 1;
        echo "<div id='phantrang' class='' align='center'>";
       
        if ($_GET['page'] > 1) {
            echo "<div>";
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . "> Back </a> ";
        }
    
        for ($i = 1; $i <= $maxPage; $i++) {
            if ($i == $_GET['page']) {
                echo '<b>Trang' . $i . '</b> '; 
            } else
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">Trang" . $i . "</a> ";
        }
     
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