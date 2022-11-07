<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bài tập</title>
    <link rel="stylesheet" href="../includes/css/style_exercise.css">
    <link rel="stylesheet" href="../includes/css/style_page.css">
</head>

<body>
    <?php $page_title = 'Register';
    include('../includes/html/header.html'); ?>

    <ul class="top-level-menu">
        <li><a href="#">Bài tập Mảng</a>
            <ul class="second-level-menu">
                <li><a href="../exercise/array/B6_Sinhmang.php">Min max trong mảng</a></li>
                <li><a href="../exercise/array/B4_Tongdayso.php">Tổng dãy số</a></li>
                <li><a href="../exercise/array/B6_Timkiem.php">Tìm kiếm trong mảng</a></li>
                <li><a href="../exercise/array/B7_Thaythe.php">Thay thế phần tử</a></li>
                <li><a href="../exercise/array/B9_Ghepmang.php">Ghép mảng</a></li>
                <li><a href="../exercise/array/B4_Matran.php">Ma trận số nguyên</a></li>
            </ul>
        </li>
        <li><a href="#">Bài tập Form</a>
            <ul class="second-level-menu">
                <li><a href="../exercise/form/B1_Tinhtiendien.php">Tính tiền điện</a></li>
                <li><a href="../exercise/form/B2_Pheptinh.php">Tính toán 2 số</a></li>
                <li><a href="../exercise/form/B3_Dientichhcn.php">Diện tích hình chữ nhật</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Bài tập MySQL</a>
            <ul class="second-level-menu">
                <li><a href="../exercise/mysql/B2_Thongtinkhachhang.php">Thông tin khách hàng</a></li>
                <li><a href="../exercise/mysql/B1_Thongtinhangsua.php">Thông tin hãng sữa</a></li>
                <li>
                    <a href="#">Thông tin sữa</a>
                    <ul class="third-level-menu">
                        <li><a href="../exercise/mysql/B7_Sanpham.php">Thông tin sản phẩm</a></li>
                        <li><a href="../exercise/mysql/B8_Chitietsanphamcophantrang.php">Chi tiết sản phẩm 2</a></li>
                        <li><a href="../exercise/mysql/B5_Thongtinsua2.php">Thông tin sản phẩm 2</a></li>
                    </ul>
                </li>
                <li><a href="#">Tìm kiếm</a>
                    <ul class="third-level-menu">
                        <li><a href="../exercise/mysql/B9_Timkiemsua.php">Tìm kiếm sữa</a></li>
                        <li><a href="../exercise/mysql/B10_Timkiemnangcao.php">Tìm kiếm sữa 2</a></li>

                    </ul>
                </li>

            </ul>
        </li>
        <li><a href="#">Bài tập OOP</a>
            <ul class="second-level-menu">
            <li><a href="../exercise/oop/B1_Caclopdongian.php">Các lớp đơn giản</a></li>
                <li><a href="../exercise/oop/B2_QuanlyNV.php">Quản lí nhân viên</a></li>
                <li><a href="../exercise/oop/B4_Chuvi.php">Tính chu vi</a></li>
                <li><a href="../exercise/oop/B3_Phanso.php">Tính toán 2 phân số</a></li>
            </ul>
        </li>
        <li><a href="../exercise/gui_mail/gui_mail.php">Bài tập gửi Mail</a></li>
    </ul>

    <center>
        <img src="../images/bg.jpg" width="1024px" alt="">
    </center>

    <?php include('../includes/html/footer.html'); ?>
</body>

</html>