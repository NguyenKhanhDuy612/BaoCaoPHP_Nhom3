<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>B9_Tìm kiếm thông tin sữa</title>
</head>

<body>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Could not connect to MySQL: ' . mysqli_connect_error());
    mysqli_set_charset($conn, 'UTF8');

    $string_querry2 = 'SELECT * FROM loai_sua';
    $result2 = mysqli_query($conn, $string_querry2);

    $string_querry3 = 'SELECT * FROM hang_sua';
    $result3 = mysqli_query($conn, $string_querry3);


     ?>
    <center>
        <h3>TÌM KIẾM THÔNG TIN SỮA_ NÂNG CAO</h3>
        <form action="" method="post" >
            <label style="padding:10px;" for="">Loại sữa</label>
            <select style="margin:10px;" name="" id="" >
                <?php while ($rows2 = mysqli_fetch_array($result2)) :;?>      
                   <option value=""><?php echo $rows2[1];?></option>
                <?php endwhile ;?>
            </select>
            <select style="margin:10px;" name="" id="" >
                <?php while ($rows3 = mysqli_fetch_array($result3)) :;?>      
                   <option value=""><?php echo $rows3[1];?></option>
                <?php endwhile ;?>
            </select> <br>
            <label style="padding:10px;" for="">Tên sữa</label>
            <input type="text" name="tenhangsua">
            <input type="submit" name="timkiem" value="Tìm kiếm"><br>
         
        </form>

    </center>

    <?php
   
    // Ket noi CSDL, require("connect.php");
    // $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
    //     or die('Could not connect to MySQL: ' . mysqli_connect_error());
    // mysqli_set_charset($conn, 'UTF8');

    if (isset($_POST['tenhangsua'])) $tenhangsua = $_POST['tenhangsua'];
    else $tenhangsua = '';

    if (isset($_POST['timkiem'])) {
        $tenhangsua = "'" . $_POST['tenhangsua'] . "'";
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

            "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>
                    <td align='center' colspan='2'  style='color:red;background:cyan'>$rows[1]-$rows[10]</td>
                    <tr >
                    <td align='center'>  <img width='200px' height='200px' src='./anh/$rows[8]' /></td>
                    <td> 
                        <p> <b>Thành phần dinh dưỡng:</b> <br> $rows[6]</p>
                        <p> <b>Lợi ích:</b> <br> $rows[7]</p>
                        <p align='right'><i><b>Trọng lượng:</b> $rows[4] gram - <b>Đơn giá:</b>  $rows[5]</i></p> 
                    </td>
                    </tr>";
                
        }
        }else{
            echo "<center >Không tìm thấy sản phẩm nào !</center>";
        }

        echo "</table>";

        // echo mysqli_num_rows($result) ;
       
    }

    ?>





</body>

</html>