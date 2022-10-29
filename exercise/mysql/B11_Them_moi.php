<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tìm kiếm sữa</title>
</head>

<body>
    <?php
    include('./connect.php');
    // include('layout.php');
    ?>

    <?php
    function lay_ms()
    {
        include("./connect.php");
        $sql = "SELECT max(Ma_sua) FROM sua";

        $result = mysqli_query($abc, $sql);

        if (mysqli_num_rows($result) <> 0) {

            while ($rows = mysqli_fetch_row($result)) {
                $mas_max = $rows['0'];
            }
        }
        $tmp = substr($mas_max, 3, 5);
        $mas_new = (int)$tmp + 1;
        return $mas_new;
    }
    $MAS1  = "NTF00" . lay_ms();

    ?>
    <?php
    if (isset($_POST['luu'])) {
        $MAS = $MAS1;
        $TENS = trim($_POST['TENS']);
        $MHS = ($_POST['MHS']);
        $MHLS = ($_POST['MHLS']);
        $TL = ($_POST['TL']);
        $DG = ($_POST['DG']);
        $TPDD = ($_POST['TPDD']);
        $LI = ($_POST['LI']);
        move_uploaded_file($_FILES["ANHS"]["tmp_name"], "images/" . $_FILES["ANHS"]["name"]);
        $ANHS = $_FILES['ANHS']['name'];

        $query = "INSERT INTO sanpham 
                    VALUES ('$MAS',' $TENS','$MHS','$MHLS','$TL','$DG',
				'$TPDD','$LI','$ANHS')
                 ";
        $result = mysqli_query($abc, $query);
        if (mysqli_affected_rows($abc) == 1) { //neu them thanh cong
            echo '<div class="alert alert-success"><strong>Thành công!</strong> Một nhân viên mới đã được thêm.</div>';
        } else //neu khong them duoc
        {
            echo "<p>Có lỗi, không thể thêm được</p>";
            echo "<p>" . mysqli_error($abc) . "<br/><br />Query: " . $query . "</p>";
        }

        // header('location: index_qlsp.php?page=1');
        // mysqli_close($abc);
    }

    // mã tăng tự động


    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <table bgcolor="#eeeeee" align="center" width="60%" border="0">
            <tr bgcolor="cyan">
                <td colspan="2" align="center">
                    <div color="blue">
                        <h2>THÊM THÔNG TIN SẢN PHẨM</h2>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Mã sữa:</td>
                <td><input required type="text" name="MAS" size="50" value="<?php echo $MAS ?>" /></td>
            </tr>
            <tr>
                <td>Tên sữa:</td>
                <td><input required type="text" name="TENS" size="50" value="<?php echo $TENS ?>" /></td>
            </tr>
            <tr>
                <td>Hãng sữa:</td>
                <td>
                    <select style="margin:10px;" name="MHS" id="">
                        <?php $query1 = "select * from hang_sua";    //Hiển thị tên các hãng sữa
                        $result1 = mysqli_query($abc, $query1); ?>
                        <?php while ($rows1 = mysqli_fetch_array($result1)) :; ?>
                            <option value="<?php echo $rows1[0]; ?>"><?php echo $rows1[1]; ?></option>
                        <?php endwhile; ?>
                    </select>

                </td>
            </tr>
            <tr>
                <td>Loại sữa:</td>
                <td>
                    <select style="margin:10px;" name="MHLS" id="">
                        <?php $query1 = "select * from loai_sua";    //Hiển thị tên các hãng sữa
                        $result1 = mysqli_query($abc, $query1); ?>
                        <?php while ($rows1 = mysqli_fetch_array($result1)) :; ?>
                            <option value="<?php echo $rows1[0]; ?>"><?php echo $rows1[1]; ?></option>
                        <?php endwhile; ?>
                    </select>

                </td>
            </tr>
            <tr>
                <td>Trọng lượng:</td>
                <td><input required type="text" name="TL" size="50" value="<?php echo $TL ?>" />(gr hoặc ml)</td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td><input required type="text" name="DG" size="50" value="<?php echo $DG ?>" />(VND)</td>
            </tr>
            <tr>
                <td>Thành phần dinh dưỡng:</td>
                <td><textarea required type="text" name="TPDD" size="50" value="<?php echo $TPDD ?>" />(VND)</td>
            </tr>
            <tr>
                <td>Lợi ích:</td>
                <td><textarea required type="text" name="LI" size="50" value="<?php echo $LI ?>" />(VND)</td>
            </tr>

            <tr>
                <td>Hình ảnh: </td>
                <td><input type="file" name="ANHS" /></td>
            </tr>

            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="luu" size="10" value="Thêm mới" />
                </td>
            </tr>

        </table>
    </form>
</body>

</html>
<!-- <?php
        include('footer.php');
        ?> -->