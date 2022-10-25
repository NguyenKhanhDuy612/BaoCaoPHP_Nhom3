<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>B8_Thông tin chi tiết sữa</title>
</head>
<body>

    <?php
    // Ket noi CSDL
    //require("connect.php");
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Could not connect to MySQL: ' . mysqli_connect_error());
    mysqli_set_charset($conn, 'UTF8');
  
    $rowsPerPage = 2; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page'])) {
        $_GET['page'] = 1;
    }
    //vị trí của mẩu tin đầu tiên trên mỗi trang
    $offset = ($_GET['page'] - 1) * $rowsPerPage;
    $result = mysqli_query($conn, 'SELECT * FROM sua, hang_sua,loai_sua
    WHERE sua.Ma_loai_sua = loai_sua.Ma_loai_sua and sua.Ma_hang_sua = hang_sua.Ma_hang_sua LIMIT ' . $offset . ', ' . $rowsPerPage);
   
    // $bg = "#eee";
    echo  "<p align='center'><font face= 'Verdana, Geneva, sans-serif' size='5'>Chi tiết sản phẩm</font></p>";
    if (mysqli_num_rows($result) <> 0) {
        while ($rows = mysqli_fetch_row($result)) {
            $rows[5] = number_format($rows[5],0,',','.')." VNĐ";
            echo
               
                "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>
                <td align='center' colspan='2' style='color:red;'>$rows[1]-$rows[10]</td>
                <tr >
                <td align='center'>  <img width='200px' height='200px' src='./anh/$rows[8]' /></td>
                <td> 
                    <p> <b>Thành phần dinh dưỡng:</b> <br> $rows[6]</p>
                    <p> <b>Lợi ích:</b> <br> $rows[7]</p>
                    <p align='right'><i><b>Trọng lượng:</b> $rows[4] gram - <b>Đơn giá:</b>  $rows[5]</i></p> 
                </td>
                </tr>";
           
        }
    }
   
        echo "</table>";


        $re = mysqli_query($conn, 'select * from sua');
        //tổng số mẩu tin cần hiển thị
        $numRows = mysqli_num_rows($re);
        //tổng số trang
        $maxPage = floor($numRows / $rowsPerPage) + 1;
    
        echo '<p align="center"> ';
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page="
            . ($_GET['page'] - 1) . "><</a> ";
        for ($i = 1; $i <= $maxPage; $i++) {
            if ($i == $_GET['page']) {
                echo '<b>' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
            } else
                echo "<a href=" . $_SERVER['PHP_SELF'] . "?page="
                    . $i . ">" . $i . "</a> ";
        }
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page="
            . ($_GET['page'] + 1) . ">></a>";
        echo '</p>';
    ?>



</body>

</html>