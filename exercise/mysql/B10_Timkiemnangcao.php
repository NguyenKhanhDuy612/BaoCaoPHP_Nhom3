<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tìm kiếm sữa nâng cao</title>
    <link rel="stylesheet" href="/includes/css/style_page.css">
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
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'qlbansua')
        or die('Could not connect to MySQL: ' . mysqli_connect_error());
    mysqli_set_charset($conn, 'UTF8');

    $string_querry2 = 'SELECT * FROM loai_sua';
    $result2 = mysqli_query($conn, $string_querry2);

    $string_querry3 = 'SELECT * FROM hang_sua';
    $result3 = mysqli_query($conn, $string_querry3);

    // if(isset($_POST['tenSua']))
    //             $tenSua = $_POST['tenSua'];
    //         else
    //             $tenSua = " ";

    //         $ls = $_POST['loaiSua'];
    //         $hs = $_POST['hangSua'];

     ?>

    <center>
        <h2>TÌM KIẾM THÔNG TIN SỮA</h2>
        <form action="" method="post">
            <label>Loại sữa</label>
            <select style="margin:10px;" name='loaiSua'>
                <?php while ($rows2 = mysqli_fetch_array($result2)) :;?>      
                   <option><?php echo $rows2[1];?></option>
                <?php endwhile ;?>
            </select>

            <label>Hãng sữa</label>
            <select style="margin:10px;" name='hangSua'>
                <?php while ($rows3 = mysqli_fetch_array($result3)) :;?>      
                   <option><?php echo $rows3[1];?></option>
                <?php endwhile ;?>
            </select> <br>

            <label>Tên sữa</label>
            <input type="text" name="tenSua" >
            <input type="submit" name="xl" value="Tìm kiếm"><br>
        </form>
    </center>

    <?php
        if(isset($_POST['xl'])){
            

            if(isset($_POST['tenSua']))
                $tenSua = $_POST['tenSua'];
            else
                $tenSua = " ";

            $ls = $_POST['loaiSua'];
            $hs = $_POST['hangSua'];

           
            $result = mysqli_query($conn,"SELECT sua.Ten_sua, hang_sua.Ten_hang_sua, sua.Hinh, sua.TP_Dinh_Duong, sua.Loi_ich, sua.Trong_luong, sua.Don_gia FROM sua, loai_sua, hang_sua WHERE sua.Ten_sua like '%$tenSua%' and hang_sua.Ten_hang_sua like '%$hs%' and loai_sua.Ten_loai like '%$ls%' and sua.Ma_hang_sua = hang_sua.Ma_hang_sua and sua.Ma_loai_sua = loai_sua.Ma_loai_sua");

            $dem = mysqli_num_rows($result);
            echo "<p align='center'> Đã tìm được ".$dem." kết quả!</p>";

            echo "<table align='center' border='1' width='1025' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
             if(mysqli_num_rows($result)<>0)
             {
                while($rows=mysqli_fetch_row($result))
                {  
                    echo "<tr bgcolor='cyan'>";
                    echo "<td colspan='2' align='center'><h2>";
                    echo $rows[0]." - ".$rows[1];
                    echo "</h2></td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td align='center' >";
                    echo "<img src='./anh/$rows[2]' width=150 height=150 style='padding: 20px;'>";
                    echo "</td>";

                    echo "<td style=width:400px;'>";
                    echo "<strong>Thành phần dinh dưỡng: </strong></br>";
                    echo $rows[3];
                    echo "</br><strong>Lợi ích: </strong></br>";
                    echo $rows[4];
                    echo "<p align='right'>"."<strong>Trọng lượng:</strong> ".$rows[5]."g - <strong>Đơn giá:</strong> ".$rows[6]." VND"."</p>";
                    echo "</td>";
                    }
                 }
                 echo "<tr><td><a href='/website/exercise.php'><input type='button'value='Trở về'></a></td></tr>";
                echo"</table>";



        }
    ?>

<?php include('../../includes/html/footer.html') ?>
</body>
</html>