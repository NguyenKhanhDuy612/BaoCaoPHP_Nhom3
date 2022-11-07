<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gửi mail</title>
    <link rel="stylesheet" href="../../includes/css/style_page.css">
</head>
<body>
    
<?php

include('../../includes/html/header2.html');
?>
<script src="./ckeditor/ckeditor.js"></script>

<div>

    <div style="width:1024px;margin:0 auto;">
        <form action="./sendmail_PHP_Mailer.php" method="POST">
            <div style="margin-bottom: 12px;">
                <label>Email nhận: </label>
                <input type="email" name="nguoi_nhan" style="width: 250px;" required>
            </div>
            <textarea name="content-mail" required>

            </textarea>
            <div style="margin-top: 12px;">
                <!-- <button class="btn btn-dark" type="submit" name="gui">
                    Gửi
                </button> -->
                <td><input type="submit" value="  Gửi  "></td>
                <td></td>
                <td><a href="../../website/exercise.php"><input type="button" value="  Trở về  "></a></td>
            </div>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace('content-mail');
</script>

<?php
include('../../includes/html/footer.html');
?>
</body>
</html>