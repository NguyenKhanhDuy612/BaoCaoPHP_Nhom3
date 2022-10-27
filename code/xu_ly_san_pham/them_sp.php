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
    function lay_msp()
    {
        include("./connect.php");
        $sql = "SELECT max(MASP) FROM sanpham";

        $result = mysqli_query($abc, $sql);

        if (mysqli_num_rows($result) <> 0) {

            while ($rows = mysqli_fetch_row($result)) {
                $masp_max = $rows['0'];
            }
        }
        $tmp = substr($masp_max, 3, 5);
        $masp_new = (int)$tmp + 1;
        return $masp_new;
    }
    $MASP1  = "SP000" . lay_msp();

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
        move_uploaded_file($_FILES["ANHSP"]["tmp_name"], "images/" . $_FILES["ANHSP"]["name"]);
        $ANHSP = $_FILES['ANHSP']['name'];

        // $query =
        // "UPDATE sanpham
        // SET  TENSP = '$TENSP', KICHTHUOC = '$KICHTHUOC', DONGIA = '$DONGIA',
        //         SLTON = '$SLTON', ANHSP = '$ANHSP'
        //         WHERE MASP = '$MASP'
        // ";
        $query = "INSERT INTO sanpham 
                    VALUES ('$MASP','$MALSP','$TENSP','$DVT','$KICHTHUOC',
				'$DONGIA','$MANCC','$SLTON','$CHITIETSP','$ANHSP')
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
                <td>Mã sản phẩm</td>
                <td><input disabled required type="text" name="MASP" size="50" value="<?php echo $MASP1 ?>" /></td>
            </tr>
            <tr>
                <td>Mã loại sản phẩm: </td>

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
                <td>Tên sản phẩm: </td>
                <td><input required type="text" name="TENSP" size="50" value="" /></td>
            </tr>
            <tr>
                <td>Đơn vị tính: </td>
                <td><input required type="text" name="DVT" size="50" value="" /></td>
            </tr>
            <tr>
                <td>Kích thước: </td>
                <td><input required type="text" name="KICHTHUOC" size="50" value="" /></td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td><input required type="text" name="DONGIA" size="50" value="" /></td>
            </tr>
            <tr>
                <td>Nhà cung cấp: </td>

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
                <td>Số lượng tồn: </td>
                <td><input required type="text" name="SLTON" size="50" value="" /></td>
            </tr>
            <tr>
                <td>Chi tiết sản phẩm: </td>
                <td><textarea type="text" resize="none" name="CHITIETSP" rows="5" cols="50" value=""> </textarea></td>
            </tr>
            <tr>
                <td>Ảnh sản phẩm: </td>
                <!-- <td><input type="text" name="DONGIA" size="50" value="" /></td> -->
                <!-- <td><?php echo '<img class="fix_img" width="200px" src="./images/' . $rows[5] . '">'; ?></td> -->
            </tr>
            <tr>
                <td></td>
                <td><input type="file" name="ANHSP" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="luu" size="10" value="Lưu" />
                </td>
            </tr>

        </table>
    </form>
</body>

</html>
<!-- <?php
        include('footer.php');
        ?> -->