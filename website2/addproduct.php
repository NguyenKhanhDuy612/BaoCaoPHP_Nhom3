<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Thêm sản phẩm</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

</head>
<?php include('./include/header.php');?>
<body>
   <div class="container">
   <?php
    include('./include/connect.php');
    // include('./include/header.php');
    ?>

    <?php
    function lay_msp()
    {
        include('./include/connect.php');
        $sql = "SELECT (MASP) FROM sanpham";
        $result = mysqli_query($abc, $sql);
        $arr = [];
        $i = 0;
        if (mysqli_num_rows($result) <> 0) {
            while ($rows = mysqli_fetch_row($result)) {

                $st_masp_max = substr($rows['0'], 3, 5);
                $n_masp_new = (int)$st_masp_max;
                $arr[$i] = $n_masp_new;
                $i++;
            }
        }
        $masp_new = max($arr) + 1;
        return $masp_new;
    }

    if (lay_msp() < 10)
        $MASP1  = "SP000" . lay_msp();
    else {
        $MASP1 = Lay_msp() < 100 ? "SP00" . lay_msp() : "SP" . lay_msp();
    }

    ?>
    <?php
    if (isset($_POST['luu'])) {
        $MASP = $MASP1;
        $MALSP = ($_POST['MALSP']);
        $TENSP = trim($_POST['TENSP']);
        $DVT = trim($_POST['DVT']);
        $KICHTHUOC = trim($_POST['KICHTHUOC']);
        $DONGIA = trim($_POST['DONGIA']);
        $MANCC = ($_POST['MANCC']);
        $SLTON = trim($_POST['SLTON']);
        $CHITIETSP = trim($_POST['CHITIETSP']);
        move_uploaded_file($_FILES["ANHSP"]["tmp_name"], "img/" . $_FILES["ANHSP"]["name"]);
        $ANHSP = $_FILES['ANHSP']['name'];

        $query = "INSERT INTO sanpham 
                    VALUES ('$MASP','$MALSP','$TENSP','$DVT','$KICHTHUOC',
				'$DONGIA','$MANCC','$SLTON','$CHITIETSP','$ANHSP')
                 ";
        $result = mysqli_query($abc, $query);
        if (mysqli_affected_rows($abc) == 1) { //neu them thanh cong
            echo '<div class="alert alert-success"><strong>Thành công!</strong> Một sản phẩm mới đã được thêm.</div>';
        } else //neu khong them duoc
        {
            echo "<p>Có lỗi, không thể thêm được</p>";
            echo "<p>" . mysqli_error($abc) . "<br/><br />Query: " . $query . "</p>";
        }
    }

    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <table bgcolor="" align="center" width="60%" border="0">
            <tr bgcolor="">
                <td colspan="2" align="center">
                    <div color="blue">
                        <p class='title' align='center'>
                            <font size='15'> THÊM THÔNG TIN SẢN PHẨM</font>
                        </P>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Mã sản phẩm</td>
                <td><input class="rounded-pill mb-3 pl-3 " disabled required type="text" name="MASP" size="50" value="<?php echo $MASP1 ?>" /></td>
            </tr>
            <tr>
                <td>Mã loại sản phẩm </td>

                <td>
                    <select style="margin:10px;" name="MALSP" id="">
                        <?php $query1 = "select * from loaisp";    //Hiển thị tên các hãng sữa
                        $result1 = mysqli_query($abc, $query1); ?>
                        <?php while ($rows1 = mysqli_fetch_array($result1)) :; ?>
                            <option value="<?php echo $rows1[0]; ?>"><?php echo $rows1[1]; ?></option>
                        <?php endwhile; ?>
                    </select>

                </td>
            </tr>

            <tr>
                <td>Tên sản phẩm </td>
                <td><input class="rounded-pill mb-3 pl-3 " required type="text" name="TENSP" size="50" value="" /></td>
            </tr>
            <tr>
                <td>Đơn vị tính </td>
                <td><input class="rounded-pill mb-3 pl-3 " required type="text" name="DVT" size="50" value="" /></td>
            </tr>
            <tr>
                <td>Kích thước </td>
                <td><input class="rounded-pill mb-3 pl-3 " required type="text" name="KICHTHUOC" size="50" value="" /></td>
            </tr>
            <tr>
                <td>Đơn giá </td>
                <td><input class="rounded-pill mb-3 pl-3 " required type="text" name="DONGIA" size="50" value="" /></td>
            </tr>
            <tr>
                <td>Nhà cung cấp </td>

                <td>
                    <select style="margin:10px;" name="MANCC" id="">
                        <?php $query2 = "select * from nhacc";    //Hiển thị tên các hãng sữa
                        $result2 = mysqli_query($abc, $query2); ?>
                        <?php while ($rows2 = mysqli_fetch_array($result2)) :; ?>

                            <option value="<?php echo $rows2[0]; ?>"><?php echo $rows2[1]; ?></option>
                        <?php endwhile; ?>
                    </select>

                </td>
            </tr>
            <tr>
                <td>Số lượng tồn </td>
                <td><input class="rounded-pill mb-3 pl-3 " required type="text" name="SLTON" size="50" value="" /></td>
            </tr>
            <tr>
                <td>Chi tiết sản phẩm </td>
                <td><textarea type="text" resize="none" name="CHITIETSP" rows="5" cols="50" value=""> </textarea></td>
            </tr>
            <tr>
                <td>Ảnh sản phẩm </td>
            </tr>
            <tr>
                <td></td>
                <td><input class="rounded-pill mb-3 pl-3 " type="file" name="ANHSP" /></td>
            </tr>
            <tr>
                <td align="center">
                    <input class="rounded-pill mb-3  btn btn-success " type="submit" name="luu" size="10" value="Lưu" />
                </td>
                <td align="center">
                    <a href="admin.php"><input class="rounded-pill mb-3  btn btn-primary" type="button" value="Trở về"></a>
                </td>
            </tr>
        </table>

    </form>
   </div>
</body>
<?php include('./include/footer.html'); ?>

</html>