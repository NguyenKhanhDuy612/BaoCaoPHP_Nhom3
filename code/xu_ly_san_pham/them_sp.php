<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Tìm kiếm sữa</title>
</head>

<body>
    <?php
    require('./connect.php');
    // include('layout.php');
    ?>
    <?php
    if (isset($_POST['luu'])) {
        // $MASP = 
        $MALSP = trim($_POST['MALSP']);
        $TENSP = trim($_POST['TENSP']);
        $DVT = trim($_POST['DVT']);
        $KICHTHUOC = trim($_POST['KICHTHUOC']);
        $DONGIA = trim($_POST['DONGIA']);
        $MANCC = trim($_POST['MANCC']);
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
        $query = "INSERT INTO sanpham VALUES ('$MALSP','$TENSP','$DVT','$KICHTHUOC',
				'$DONGIA','$MANCC','$SLTON','$CHITIETSP','$ANHSP')";
        $result = mysqli_query($abc, $query);
        header('location: index_qlsp.php?page=1');
    }
    // else echo "Vui lòng chọn file upload!";
    //cap nhat ma hang sua va ma loai sua
    // $ma_loai_nhan_vien=$_POST['loai_nv'];
    // $ma_phong_ban=$_POST['phong_ban'];

    // if(empty($errors))//neu khong co loi xay ra
    // { 
    // 	$query="INSERT INTO nhanvien VALUES ('$ma_nv','$ho_nv','$ten_nv','$ngay_sinh',
    // 			'$gioi_tinh','$dia_chi','$ma_loai_nhan_vien','$ma_phong_ban','$anh')";
    // 	$result=mysqli_query($abc,$query);
    // 	if(mysqli_affected_rows($abc)==1){//neu them thanh cong
    // 		echo '<div class="alert alert-success"><strong>Thành công!</strong> Một nhân viên mới đã được thêm.</div>';				
    // 	}
    // 	else //neu khong them duoc
    // 	{
    // 		echo "<p>Có lỗi, không thể thêm được</p>";
    // 		echo "<p>".mysqli_error($abc)."<br/><br />Query: ".$query."</p>";	
    // 	}
    // }
    // else
    // {//neu co loi
    // 	echo "<h2></h2><p>Có lỗi xảy ra:<br/>";
    // 	foreach($errors as $msg)
    // 	{
    // 		echo "- $msg<br /><\n>";
    // 	}
    // 	echo "</p><p>Hãy thử lại.</p>";
    // }

    // mysqli_close($abc);
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
                <td>Mã loại sản phẩm: </td>

                <td>


                    <select style="margin:10px;" name="MALSP" id="">
                        <?php $query = "select * from loaisp";    //Hiển thị tên các hãng sữa
                        $result = mysqli_query($abc, $query); ?>
                        <?php while ($rows2 = mysqli_fetch_array($result)) :; ?>

                            <option value=""><?php echo $rows2[1]; ?></option>
                            <!-- <option value=""><?php print_r($rows2); ?></option> -->
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
                <td>Mã nhà cung cấp: </td>
                <td><input required type="text" name="MANCC" size="50" value="" /></td>
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
<?php
include('footer.php');
?>