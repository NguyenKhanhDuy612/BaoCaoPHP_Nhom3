<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>B7_Thông tin sữa</title>
</head>
<body>

    <?php
    // Ket noi CSDL
    //require("connect.php");
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Could not connect to MySQL: ' . mysqli_connect_error());
    mysqli_set_charset($conn, 'UTF8');

    $id  = "'".$_GET['id']."'";
    $result = mysqli_query($conn,'SELECT * FROM sua, hang_sua WHERE  sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_sua = '.$id );
    // echo 'SELECT * FROM sua WHERE ma_sua = '.$id;

    $bg = "#eee";
    if (mysqli_num_rows($result) <> 0) {
        while ($rows = mysqli_fetch_row($result)) {
            $rows[5] = number_format($rows[5],0,',','.')." VNĐ";
            echo
                "<p align='center'><font face= 'Verdana, Geneva, sans-serif' size='5'>Chi tiết sản phẩm</font></p>
                <table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>
                <td align='center' colspan='2' style='color:red;'>$rows[1]-$rows[10]</td>
                <tr >
                <td align='center'>  <img width='200px' height='200px' src='./anh/$rows[8]' /></td>
                <td> 
                    <p> <b>Thành phần dinh dưỡng:</b> <br> $rows[6]</p>
                    <p> <b>Lợi ích:</b> <br> $rows[7]</p>
                    <p align='right'><i><b>Trọng lượng:</b> $rows[4] gram - <b>Đơn giá:</b>  $rows[5]</i></p> 
                </td>
                </tr>
                <tr><td colspan='2' align='right'><a href='B7_Sanpham.php'>Trở về</a></td></tr> ";
        }
    }
   
            echo "</table>";
    ?>

</body>

</html>