<?php


$conn = mysqli_connect('localhost', 'root', '', 'qlsg') or die('Could not connect to MySQL: ' . mysqli_connect_error());
mysqli_set_charset($conn, 'UTF8');

session_start();

if (isset($_POST['submit'])) {
   $tenDN = mysqli_real_escape_string($conn, $_POST['tenDN']);
   $mk = $_POST['mk'];

   $select = " SELECT MANV,TENNV,NGAYSINH,SDT,CHUCVU,TENDN,MK,ANHNV,EMAIL FROM nhanvien WHERE TENDN = '$tenDN' && MK = '$mk' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) <> 0) {
      while ($rows = mysqli_fetch_row($result)) {
         if ($rows[4] == 'Quản Lý' || $rows[4] == 'Quản trị viên') {
            $_SESSION['tenQuanTriVien'] = $rows[1];

            // header('location:./code/xu_ly_san_pham/index_qlsp.php');

            header('location: exercise/xu_ly_san_pham/index_qlsp.php');

         } elseif ($rows[4] == 'Nhân Viên') {
            $_SESSION['tenNguoiDung'] = $rows[1];
            header('location: user_page.php');
         }
      }
   } else {
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
   <title>Đăng nhập tài khoản</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="./includes/css/style_page2.css">

</head>

<body>

   <div class="form-container">

      <form action="" method="post">
         <h3>Đăng nhập</h3>
         <!-- <h3>Đăng nhập</h3> -->
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="text" name="tenDN" required placeholder="Nhập tên đăng nhập">
         <input type="password" name="mk" required placeholder="Nhập mật khẩu">
         <input type="submit" name="submit" value="Đăng nhập" class="form-btn">
         <p>Bạn chưa có tài khoản? <a href="./website/register_form.php">Đăng ký ngay</a></p>
      </form>

   </div>

</body>

</html>