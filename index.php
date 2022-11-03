<?php
$conn = mysqli_connect ('localhost','root','','qlsg') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
mysqli_set_charset($conn, 'UTF8');

session_start();

if(isset($_POST['submit'])){
   $tenDN = mysqli_real_escape_string($conn, $_POST['tenDN']);
   $mk = $_POST['mk'];

   $staffSelect = "SELECT CHUCVU, TENNV, TENDN, MK FROM nhanvien WHERE TENDN = '$tenDN' && MK = '$mk' ";
   $custormerSelect = "SELECT TENDN,TENKH, MK FROM khachhang WHERE TENDN = '$tenDN' && MK = '$mk' ";

   $staffResult = mysqli_query($conn, $staffSelect);
   $custormerResult = mysqli_query($conn, $custormerSelect);

   if(mysqli_num_rows($staffResult) <> 0){
      while($rows=mysqli_fetch_row($staffResult)){
         if($rows[0] == 'Quản Lý'){
            $_SESSION['tenQuanTriVien'] = $rows[1];
            header('location:/website2/admin.php');
         }
         // elseif($rows[0] == 'Nhân Viên'){
         //    $_SESSION['tenNguoiDung'] = $rows[1];
         //    header('location:website2/home.php');
         // }
         else
         {
            $error[] = 'Bạn không phải quản trị viên!';
         }
      }
   }
   elseif(mysqli_num_rows($custormerResult) <> 0)
   {
      while($rows=mysqli_fetch_row($custormerResult)){
         $_SESSION['tenNguoiDung'] = $rows[1];
         header('location:website2/home.php');
      }
   }
   else{
      $error[] = 'Tên đăng nhập hoặc mật khẩu không đúng!';
   }

};
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng nhập</title>


   <link rel="stylesheet" href="./website2/css/style2.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Đăng nhập</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="tenDN" required placeholder="Tên đăng nhập">
      <input type="password" name="mk" required placeholder="Mật khẩu">
      <input type="submit" name="submit" value="Đăng nhập" class="form-btn">
      <p>Bạn chưa có tài khoản? <a href="./website2/register.php">Đăng ký ngay</a></p>
   </form>

</div>

</body>
</html>