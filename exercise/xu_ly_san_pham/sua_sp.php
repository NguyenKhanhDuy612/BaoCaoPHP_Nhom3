<!-- <?php
        include('layout.php');
        ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    require_once("connect.php");

    // function buildDropDownList(mysqli_result $result, string $selectName, string $idName, string $idValue, string $selectedValue = null)
    // {
    //     if (mysqli_num_rows($result) != 0) {
    //         while ($row = mysqli_fetch_array($result)) {
    //             echo "<option value='" . $row[$idName] . "' ";
    //             if (isset($_REQUEST[$selectName]) && $_REQUEST[$selectName] == $row[$idName]) {
    //                 echo "selected='selected'";
    //             } else if ($selectedValue == $row[$idName]) {
    //                 echo "selected='selected'";
    //             }
    //             echo ">" . $row[$idValue] . "</option>";
    //         }
    //     }
    //     mysqli_free_result($result);
    // }

    $MASP = $_GET['id'];
    $query = "SELECT MASP,TENSP,KICHTHUOC,DONGIA,SLTON,ANHSP
					from  SANPHAM 
                    where MASP='$MASP'";
    // $query = "SELECT * FROM SANPHAM ";
    $result = mysqli_query($abc, $query);
    $rows = mysqli_fetch_row($result);
    // $nhanVien = $result->fetch_assoc();
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table bgcolor="#eeeeee" align="center" width="60%" border="0">
            <tr bgcolor="cyan">
                <td colspan="2" align="center">
                    <div color="blue">
                        <h2>SỬA THÔNG TIN SẢN PHẨM</h2>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Mã sản phẩm: </td>
                <td><input required type="text" name="MASP" size="20" disabled value="<?php echo $rows[0]; ?>" /></td>
            </tr>
            <tr>
                <td>Tên sản phẩm: </td>
                <td><input required type="text" name="TENSP" size="50" value="<?php echo $rows[1]; ?>" /></td>
            </tr>
            <tr>
                <td>Kích thước: </td>
                <td><input required type="text" name="KICHTHUOC" size="50" value="<?php echo $rows[2]; ?>" /></td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td><input required type="text" name="DONGIA" size="50" value="<?php echo $rows[3]; ?>" /></td>
            </tr>
            <tr>
                <td>Số lượng tồn: </td>
                <td><input required type="text" name="SLTON" size="50" value="<?php echo $rows[4]; ?>" /></td>
            </tr>
            <!-- <tr>
	<td>Chi tiết sản phẩm: </td>
	<td><textarea type="text" name="CHITIETSP"  rows="5" cols="50" value="<?php echo $rows[5]; ?>"> </textarea></td>
</tr> -->
            <tr>
                <td>Ảnh sản phẩm: </td>
                <!-- <td><input type="text" name="DONGIA" size="50" value="<?php echo $rows[5]; ?>" /></td> -->
                <td><?php echo '<img class="fix_img" width="200px" src="./images/' . $rows[5] . '">'; ?></td>
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
    <?php

    // if($_SERVER['REQUEST_METHOD']=="POST"){
    if (isset($_POST['luu'])) {

        $TENSP = trim($_POST['TENSP']);
        $KICHTHUOC = trim($_POST['KICHTHUOC']);
        $DONGIA = trim($_POST['DONGIA']);
        $SLTON = trim($_POST['SLTON']);
        move_uploaded_file($_FILES["ANHSP"]["tmp_name"], "images/" . $_FILES["ANHSP"]["name"]);
        $ANHSP = $_FILES['ANHSP']['name'];

        $query =
            "UPDATE sanpham
            SET  TENSP = '$TENSP', KICHTHUOC = '$KICHTHUOC', DONGIA = '$DONGIA',
                    SLTON = '$SLTON', ANHSP = '$ANHSP'
                    WHERE MASP = '$MASP'
            ";
        $result = mysqli_query($abc, $query);
        header('location: index_qlsp.php?page=1');
    }
    mysqli_close($abc);
    ?>
</body>

</html>
<!-- <?php
        include('footer.php');
        ?> -->