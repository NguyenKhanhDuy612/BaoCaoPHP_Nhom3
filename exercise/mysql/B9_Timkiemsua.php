<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tìm kiếm thông tin sữa</title>
    <link rel="stylesheet" href="../../includes/css/style_page.css">
</head>

<body>
<style>
        table{
            margin: 0 auto;
        }
        td{
            width: 50px;
        }
    </style>
    <?php include('../../includes/html/header2.html') ?>

    <center>
        <h2>TÌM KIẾM THÔNG TIN SỮA</h2>
        <form action="" method="post">
            <label for="">Tên hãng sữa</label>
            <input type="text" name="noidung">
            <input type="submit" name="timkiem" value="Tìm kiếm"><br>
         
        </form>

    </center>

    <?php
    $total = 0;
    // Ket noi CSDL, require("connect.php");
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Could not connect to MySQL: ' . mysqli_connect_error());
    mysqli_set_charset($conn, 'UTF8');

    if (isset($_POST['noidung'])) $tenhangsua = $_POST['noidung'];
    else $tenhangsua = '';

    if (isset($_POST['timkiem'])) {
        $tenhangsua = "'" . $_POST['noidung'] . "'";
        $string_querry = 'SELECT * FROM sua, hang_sua,loai_sua
        WHERE sua.Ma_loai_sua = loai_sua.Ma_loai_sua and sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
         and hang_sua.ten_hang_sua = ' . $tenhangsua;   
        $result = mysqli_query($conn, $string_querry);

       
        if (mysqli_num_rows($result) <> 0) {
            $total =  mysqli_num_rows($result);
            echo "<center> <b>Có $total sản phẩm tìm được </b> </center> <br>";
        while ($rows = mysqli_fetch_row($result)) {
            

            $rows[5] = number_format($rows[5], 0, ',', '.') . " VNĐ";
            echo

            "<table align='center' width='1025px' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>
                    <td align='center' colspan='2'  style='color:black;background:cyan'><h2>$rows[1]-$rows[10]</h2></td>
                    <tr >
                    <td align='center'>  <img width='200px' height='200px' src='../../images/$rows[8]' /></td>
                    <td style=width:400px;'> 
                        <p> <b>Thành phần dinh dưỡng:</b> <br> $rows[6]</p>
                        <p> <b>Lợi ích:</b> <br> $rows[7]</p>
                        <p align='right'><i><b>Trọng lượng:</b> $rows[4] gram - <b>Đơn giá:</b>  $rows[5]</i></p> 
                    </td>
                    </tr>";
                
        }
        }else{
            echo "<center >Không tìm thấy sản phẩm nào !</center>";
        }
        echo "<tr><td><a href='../../website/exercise.php'><input type='button'value='Trở về'></a></td></tr>";

        echo "</table>";

        // echo mysqli_num_rows($result) ;
       
    }

    ?>


<?php include('../../includes/html/footer.html') ?>


</body>

</html>