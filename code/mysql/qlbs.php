<!-- <?php
        // 1. Ket noi CSDL
        $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
            or die('Không thể kết nối tới database' . mysqli_connect_error());
        // 2. Chuan bi cau truy van & 3. Thuc thi cau truy van
        $sql = "SELECT * FROM sua";
        $result = mysqli_query($conn, $sql);
        // 4.Xu ly du lieu tra ve
        if (mysqli_num_rows($result) != 0) {
            while ($row = mysqli_fetch_array($result)) {
                for ($i = 0; $i < mysqli_num_fields($result); $i++)
                    echo $row[$i] . '';
            }
        }
        //5. Xoa ket qua khoi vung nho va Dong ket noi
        mysqli_free_result($result);
        mysqli_close($conn);
        ?>a -->


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Thông tin sữa</title>

</head>

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
    //lấy $rowsPerPage mẩu tin, bắt đầu từ vị trí $offset
    $result = mysqli_query($conn, 'SELECT Ma_sua, ten_sua, Trong_luong,
            Don_gia FROM sua LIMIT ' . $offset . ', ' . $rowsPerPage);
    echo "<p align='center'><font face= 'Verdana, Geneva, sans-serif' size='5'> THÔNG TIN SỮA</font></P>";

    // $result = mysqli_query($conn, $sql);
    // echo "<p align='center'><font size='5' color='blue'> THÔNG TIN SỮA</font></P>";
    echo "<table align='center' width='700' border='1' cellpadding='2'  cellspacing='2' style='border-collapse:collapse'>";
    echo '<tr>
            <th width="30">STT</th>
            <th width="50">Mã sữa</th>
            <th width="150">Tên sữa</th>
            <th width="50">Trọng lượng</th>
        </tr>';

    $bg = "#eee";
    if (mysqli_num_rows($result) <> 0) {
        $stt = 1;

        while ($rows = mysqli_fetch_row($result)) {
            $bg = (($stt % 2 == 0) ? "#fff" : "#eee");
            echo "<tr bgcolor = '$bg'>";
            echo "<td>$stt</td>";
            echo "<td>$rows[0]</td>";
            echo "<td>$rows[1]</td>";
            echo "<td>$rows[2]</td>";
            echo "</tr>";
            $stt += 1;
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
        . ($_GET['page'] - 1) . ">Back</a> ";
    for ($i = 1; $i <= $maxPage; $i++) {
        if ($i == $_GET['page']) {
            echo '<b>Trang' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
        } else
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page="
                . $i . ">Trang" . $i . "</a> ";
    }
    echo "<a href=" . $_SERVER['PHP_SELF'] . "?page="
        . ($_GET['page'] + 1) . ">Next</a>";
    echo '</p>';
    // echo 'Tong so trang la: ' . $maxPage;

    ?>

</body>

</html>