<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B7_Thông tin sữa</title>
</head>
<body>
    
</body>
</html>
<body>

    <?php
    // Ket noi CSDL
    //require("connect.php");
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Could not connect to MySQL: ' . mysqli_connect_error());
    mysqli_set_charset($conn, 'UTF8');
    // $sql = 'select Ma_sua,ten_sua,Trong_luong,Don_gia from sua';
    $rowsPerPage = 10; //số mẩu tin trên mỗi trang, giả sử là 10
    if (!isset($_GET['page'])) {
        $_GET['page'] = 1;
    }
    //vị trí của mẩu tin đầu tiên trên mỗi trang
    $offset = ($_GET['page'] - 1) * $rowsPerPage;

    $result = mysqli_query($conn, 'SELECT sua.Ten_sua, hang_sua.Ten_hang_sua, loai_sua.Ten_loai, sua.Trong_luong, sua.Don_gia, sua.hinh, sua.ma_sua FROM sua, hang_sua,loai_sua
    WHERE sua.Ma_loai_sua = loai_sua.Ma_loai_sua and sua.Ma_hang_sua = hang_sua.Ma_hang_sua LIMIT ' . $offset . ', ' . $rowsPerPage);
    echo "<p align='center'><font face= 'Verdana, Geneva, sans-serif' size='5'> Danh sách sản phẩm</font></P>";

    // <form action="" method="post"></form>
     echo "<table align='center' width='1300' border='1' cellpadding='2'  cellspacing='2' style='border-collapse:collapse' >";
    
    if (mysqli_num_rows($result) <> 0) {
        $stt = 1;
        $n = 0;

        while (($rows = mysqli_fetch_row($result))) {
            $rows[4] = number_format($rows[4], 0, ',', '.') . " VNĐ";

            if ($n < 10) {
                echo  "<td width='400px' align='center'>
                            <a href='B7_Chitietsanpham.php?id=$rows[6]'>$rows[0]</a>
                            <p >$rows[2] - $rows[3] gram - $rows[4]</p> 
                            <img width='100px' height = '120px' src='./anh/$rows[5]' />
                        </td>";
                $n++;
            }
            if ($n == 5){
                echo " <tr> </tr> ";
            }
           
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
    // echo 'Tong so trang la: ' . $maxPage;

    ?>

</body>

</html>