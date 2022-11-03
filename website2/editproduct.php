<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->

</head>

<body>
<?php include('./include/header.php'); ?>
    <?php
      include('./include/connect.php');
    $MASP = $_GET['id'];
    $query = "SELECT MASP,TENSP,KICHTHUOC,DONGIA,SLTON,ANHSP
					from  SANPHAM 
                    where MASP='$MASP'";
   
    $result = mysqli_query($abc, $query);
    $rows = mysqli_fetch_row($result);
  
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <table bgcolor="" align="center" width="60%" border="0">
            <tr bgcolor="">
                <td colspan="2" align="center">
                    <div color="blue">
                        <p class='title' align='center'>
                            <font size='15'> CẬP NHẬT THÔNG TIN SẢN PHẨM</font>
                        </P>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Mã sản phẩm: </td>
                <td><input class=" mb-3 rounded-pill pl-3 " required type="text" name="MASP" size="50" disabled value="<?php echo $rows[0]; ?>" /></td>
            </tr>
            <tr>
                <td>Tên sản phẩm: </td>
                <td><input class=" mb-3 rounded-pill pl-3" required type="text" name="TENSP" size="50" value="<?php echo $rows[1]; ?>" /></td>
            </tr>
            <tr>
                <td>Kích thước: </td>
                <td><input class="mb-3 rounded-pill pl-3" required type="text" name="KICHTHUOC" size="50" value="<?php echo $rows[2]; ?>" /></td>
            </tr>
            <tr>
                <td>Đơn giá: </td>
                <td><input class="mb-3 rounded-pill pl-3" required type="text" name="DONGIA" size="50" value="<?php echo $rows[3]; ?>" /></td>
            </tr>
            <tr>
                <td>Số lượng tồn: </td>
                <td><input class="mb-3 rounded-pill pl-3" required type="text" name="SLTON" size="50" value="<?php echo $rows[4]; ?>" /></td>
            </tr>
   

            <tr>
                <td></td>
                <td><input class="rounded-5" type="file" name="ANHSP" /></td>
            </tr>
            <tr>
                <td align="center">
                    <input class="rounded-pill btn btn-success" type="submit" name="luu" value="Cập nhật" />
                </td>
                <td align="center">
                    <a href="admin.php"><input class="rounded-pill btn btn-primary" type="button" value="Trở về"></a>
                </td>
            </tr>
           
        </table>

    </form>
    <?php

   
    if (isset($_POST['luu'])) {

        $TENSP = trim($_POST['TENSP']);
        $KICHTHUOC = trim($_POST['KICHTHUOC']);
        $DONGIA = trim($_POST['DONGIA']);
        $SLTON = trim($_POST['SLTON']);
        move_uploaded_file($_FILES["ANHSP"]["tmp_name"], "img/" . $_FILES["ANHSP"]["name"]);
        $ANHSP = $_FILES['ANHSP']['name'];

        $query =
            "UPDATE sanpham
            SET  TENSP = '$TENSP', KICHTHUOC = '$KICHTHUOC', DONGIA = '$DONGIA',
                    SLTON = '$SLTON', ANHSP = '$ANHSP'
                    WHERE MASP = '$MASP'
            ";
        $result = mysqli_query($abc, $query);
        if (mysqli_affected_rows($abc) == 1) { //neu them thanh cong
            echo '<center pt-2 ><strong>Cập nhật thành công!</strong></center>';
        } else //neu khong them duoc
        {
            echo "<p>Có lỗi, không thể thêm được</p>";
            echo "<p>" . mysqli_error($abc) . "<br/><br />Query: " . $query . "</p>";
        }
       
    }
    mysqli_close($abc);
    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php include('./include/footer.html'); ?>
?>