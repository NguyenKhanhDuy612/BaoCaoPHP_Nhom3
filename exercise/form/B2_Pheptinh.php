<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Phép tính với 2 số</title>
    <link rel="stylesheet" href="/includes/style.css">
    <link rel="stylesheet" href="/includes/css/style_page.css">
    <style>
       
        td {
            width: 468px;
            width: 385px;
        }

        table {
            margin: 0 auto;

        }
    </style>

</head>

<body>
<?php include('../../includes/html/header2.html') ?>
    <!-- ketquapheptinh.php -->
    <center>
    <form action="./ketquapheptinh.php" method="POST">
        <table border='0'>
        <thead>
                    <th colspan="2" align="center">
                        <h2>PHÉP TÍNH 2 SỐ</h2>
                    </th>
                </thead>
            <tr>
                <td>Chọn phép tính</td>
                <td>        
                    <input type="radio" name="ptinh" value="Cộng" <?php if (isset($_POST['ptinh']) && ($_POST['ptinh']) == "cong") echo 'checked="checked"' ?> />Cộng
                    <input type="radio" name="ptinh" value="Trừ" <?php if (isset($_POST['ptinh']) && ($_POST['ptinh']) == "tru") echo 'checked="checked"' ?> />Trừ
                    <input type="radio" name="ptinh" value="Nhân" <?php if (isset($_POST['ptinh']) && ($_POST['ptinh']) == "nhan") echo 'checked="checked"' ?> />Nhân
                    <input type="radio" name="ptinh" value="Chia" <?php if (isset($_POST['ptinh']) && ($_POST['ptinh']) == "chia") echo 'checked="checked"' ?> />Chia
                </td>
            </tr>
            </tr>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type="text" size="50" name="so1" value="<?php if (isset($_POST['so1'])) echo $_POST['so1']; ?>" /></td>
            </tr>

            <tr>
                <td>Số thứ hai:</td>
                <td><input type="text" size="50" name="so2" value="<?php if (isset($_POST['so2'])) echo $_POST['so2']; ?>" /></td>
            </tr>
            <!-- <tr>
                <td>Kết quả:</td>
                <td><input type="text" name="kq" value="<?php if (isset($_POST['kq'])) echo $_POST['kq'];?>" /></td>
            </tr> -->
            <tr>
              
            <td><a href="/website/exercise.php"><input type="button" value="Trở về"></a></td>
                <td ><input type="submit" name="tinh" value="TÍNH" /></td>
            </tr>

        </table>

        </fieldset>

    </form>
    </center>


    <?php include('../../includes/html/footer.html') ?>
</body>

</html>