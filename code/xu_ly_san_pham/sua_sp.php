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

    function buildDropDownList(mysqli_result $result, string $selectName, string $idName, string $idValue, string $selectedValue = null)
    {
        if (mysqli_num_rows($result) != 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<option value='" . $row[$idName] . "' ";
                if (isset($_REQUEST[$selectName]) && $_REQUEST[$selectName] == $row[$idName]) {
                    echo "selected='selected'";
                } else if ($selectedValue == $row[$idName]) {
                    echo "selected='selected'";
                }
                echo ">" . $row[$idValue] . "</option>";
            }
        }
        mysqli_free_result($result);
    }

    $MASP = $_GET['id'];
    $query ="SELECT MASP,TENSP,KICHTHUOC,DONGIA,SLTON,ANHSP
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
	<td><input required type="text" name="MASP" size="20" disabled value="<?php echo $rows[0];?>" /></td>
</tr>
<tr>
	<td>Tên sản phẩm: </td>
	<td><input required type="text" name="TENSP" size="50" value="<?php echo $rows[1];?>" /></td>
</tr>
<tr>
    <td>Kích thước: </td>
    <td><input required type="text" name="KICHTHUOC" size="50" value="<?php echo $rows[2];?>" /></td>
</tr>
<tr>
	<td>Đơn giá: </td>
	<td><input required type="text" name="DONGIA" size="50" value="<?php echo $rows[3];?>" /></td>
</tr>
<tr>
	<td>Số lượng tồn: </td>
	<td><input required type="text" name="SLTON" size="50" value="<?php echo $rows[4];?>" /></td>
</tr>
<!-- <tr>
	<td>Chi tiết sản phẩm: </td>
	<td><textarea type="text" name="CHITIETSP"  rows="5" cols="50" value="<?php echo $rows[5];?>"> </textarea></td>
</tr> -->
<tr>
	<td>Ảnh sản phẩm: </td>
	<!-- <td><input type="text" name="DONGIA" size="50" value="<?php echo $rows[5];?>" /></td> -->
	<td><?php echo '<img class="fix_img" width="200px" src="./images/'.$rows[5].'">'; ?></td>
</tr>
<tr>
	<td></td>
    <td><input type="file" name="ANHSP" /></td>
</tr>
<tr>
	<td colspan="2" align="center" >
        <input type="submit" name ="luu" size="10" value="Lưu" />
    </td>
</tr>
</table>
</form>
<?php
    
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $errors=array(); //khởi tạo 1 mảng chứa lỗi
        //kiem tra ma sua
        //kiểm tra tên sản phẩm
        if(empty($_POST['TENSP'])){
            $errors[]="Bạn chưa nhập tên sản Phẩm";
        }
        else{
            $TENSP=trim($_POST['TENSP']);
        }

        if(empty($_POST['KICHTHUOC'])){
            $errors[]="Bạn chưa nhập kích thước";
        }
        else{
            $KICHTHUOC=trim($_POST['KICHTHUOC']);
        }

        if(empty($_POST['DONGIA'])){
            $errors[]="Bạn chưa nhập đơn giá";
        }
        else{
            $DONGIA=trim($_POST['DONGIA']);
        }
        
        if(empty($_POST['SLTON'])){
            $errors[]="Bạn chưa nhập số lượng tồn";
        }
        else{
            $SLTON=trim($_POST['SLTON']);
        }
        //cap nhat ma hang sua va ma loai sua
        // $malnv=$_POST['loaiNV'];
        // $mapb=$_POST['pb'];
        //kiểm tra hình sản phẩm và thực hiện upload file
        if($_FILES['ANHSP']['name']!=NULL)
        {
            move_uploaded_file($_FILES["ANHSP"]["tmp_name"],"images/".$_FILES["ANHSP"]["name"]);
            $ANHSP=$_FILES['ANHSP']['name'];
        }
        else echo "Vui lòng chọn file upload!";
        if(empty($errors))//neu khong co loi xay ra
        { 
            $query =
            "UPDATE sanpham
            SET  TENSP = '$TENSP', KICHTHUOC = '$KICHTHUOC', DONGIA = '$DONGIA',
                    SLTON = '$SLTON', ANHSP = '$ANHSP'
                    WHERE MASP = '$MASP'
            ";
            $result=mysqli_query($abc,$query);
            if(mysqli_affected_rows($abc)==1){//neu them thanh cong
                echo "<div align='center'>Thêm mới thành công!</div>";
                // header("Location: " . "index_nhanvien2.php");		
            }
            else //neu khong them duoc
            {
                echo "<p>Có lỗi, không thể thêm được</p>";
                echo "<p>".mysqli_error($abc)."<br/><br />Query: ".$query."</p>";	
            }
        }
        else
        {//neu co loi
            echo "<h2>Lá»—i</h2><p>Có lỗi xảy ra:<br/>";
            foreach($errors as $msg)
            {
                echo "- $msg<br /><\n>";
            }
            echo "</p><p>Hãy thử lại.</p>";
        }
    }
    mysqli_close($abc);
    ?>
</body>

</html>
<!-- <?php
    include('footer.php');
?> -->