<?php

function lay_mkh()
    {
      $conn = mysqli_connect ('localhost','root','','qlsg') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
        $sql = "SELECT (MAKH) FROM khachhang";
        $result = mysqli_query($conn, $sql);
        $arr = [];
        $i = 0;
        if (mysqli_num_rows($result) <> 0) {
            while ($rows = mysqli_fetch_row($result)) {

                $st_makh_max = substr($rows['0'], 3, 5);
                $n_makh_new = (int)$st_makh_max;
                $arr[$i] = $n_makh_new;
                $i++;
            }
        }
        $makh_new = max($arr) + 1;
        return $makh_new;
    }
    if(lay_mkh() <10)
    	$MaKH  = "KH000". lay_mkh();
	else{
		$MaKH= lay_mkh() <100? "KH00". lay_mkh() : "KH". lay_mkh();}

    // $MaKH  = "KH000".lay_mkh();

if(isset($_POST['submit'])){
$conn = mysqli_connect ('localhost','root','','qlsg') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
mysqli_set_charset($conn, 'UTF8');
    
    
    // dieu chinh lai
   $tenKH = mysqli_real_escape_string($conn, $_POST['tenKH']);
   $soDienThoai = mysqli_real_escape_string($conn, $_POST['soDienthoai']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $diaChi = mysqli_real_escape_string($conn, $_POST['diaChi']);
   $tenDangNhap = mysqli_real_escape_string($conn, $_POST['tenDangNhap']);
   $mk = $_POST['password'];
   $nlmk = $_POST['cpassword'];
   $nguoiDung = $_POST['nguoiDung'];

   $select = " SELECT * FROM nhanvien WHERE EMAIL = '$email' && MK = '$mk' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Tài khoảng đã tồn tại!';

   }else{

      if($mk != $nlmk){
         $error[] = 'Mật khẩu không khớp!';
      }else{
         $insert = "INSERT INTO khachhang(MAKH, TENKH, SDT, TENDN, MK, EMAIL, DIACHI) VALUES('$MaKH','$tenKH','$soDienThoai','$tenDangNhap','$mk','$email', '$diaChi')";
         mysqli_query($conn, $insert);
         header('location:./../index.php');
      }
   }

};

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng ký</title>
   
   <link rel="stylesheet" href="../website2/css/style2.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="POST">
      <h3>Đăng ký</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="tenKH" required placeholder="Họ và tên">
      <input type="text" name="soDienthoai" required placeholder="Số điện thoại">
      <input type="text" name="tenDangNhap" required placeholder="Tên đăng nhập">
      <input type="password" name="password" required placeholder="Mật khẩu">
      <input type="password" name="cpassword" required placeholder="Xác nhận mật khẩu">
      <input type="email" name="email" required placeholder="Email">
      <input type="text" name="diaChi" required placeholder="Địa chỉ">
      <input type="submit" name="submit" value="Đăng ký" class="form-btn">
      <p>Bạn đã có tài khoản? <a href="./../index.php">Đăng nhập ngay</a></p>
   </form>

</div>

</body>
</html>