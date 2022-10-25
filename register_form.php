<?php

$conn = mysqli_connect ('localhost','root','','qlsg') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
mysqli_set_charset($conn, 'UTF8');

if(isset($_POST['submit'])){

   $maNV  = mysqli_real_escape_string($conn, $_POST['MaNV']);
   $tenNV = mysqli_real_escape_string($conn, $_POST['tenND']);
   $ngaySinh = mysqli_real_escape_string($conn, $_POST['ngaySinh']);
   $soDienThoai = mysqli_real_escape_string($conn, $_POST['soDienthoai']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
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
         $error[] = 'Mặt khẩu không khớp!';
      }else{
         $insert = "INSERT INTO nhanvien(MANV, TENNV, NGAYSINH, SDT, CHUCVU, TENDN, MK, ANHNV, EMAIL) VALUES('$maNV','$tenNV','$ngaySinh','$soDienThoai','$nguoiDung','$tenDangNhap','$mk',' ','email')";
         mysqli_query($conn, $insert);
         header('location:index.php');
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
   <title>Đăng ký tài khoảng</title>
   <link rel="stylesheet" href="./includes/style2.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Đăng ký</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="MaNV" required placeholder="Nhập mã nhân viên của bạn">
      <input type="text" name="tenND" required placeholder="Nhập tên của bạn">
      <input type="date" name="ngaySinh" required placeholder="Nhập ngày sinh của bạn">
      <input type="text" name="soDienthoai" required placeholder="Nhập số điện thoại của bạn">
      <input type="password" name="password" required placeholder="Nhập mật khẩu">
      <input type="password" name="cpassword" required placeholder="Xác nhận mật khẩu">
      <input type="email" name="email" required placeholder="Nhập email của bạn">
      <input type="text" name="tenDangNhap" required placeholder="Tên đăng nhập">
      <select name="nguoiDung">
         <option value="Nhân viên">Nhân viên</option>
         <option value="Quản lý">Quản lý/Quản trị viên</option>
      </select>
      <input type="submit" name="submit" value="Đăng ký" class="form-btn">
      <p>Bạn đã có tài khoản? <a href="index.php">Đăng nhập ngay</a></p>
   </form>

</div>

</body>
</html>