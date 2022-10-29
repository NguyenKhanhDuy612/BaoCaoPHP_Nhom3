<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Phép tính với 2 số</title>

    <style>
        input {

            margin: 5px;

        }
    </style>

</head>

<body>

    <!-- ketquapheptinh.php -->
    <center>
    <form action="./ketquapheptinh.php" method="POST">
        <table border='0'>
            <h3>Phép tính với 2 số</h3>
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
                <td><input type="text" name="so1" value="<?php if (isset($_POST['so1'])) echo $_POST['so1']; ?>" /></td>
            </tr>

            <tr>
                <td>Số thứ hai:</td>
                <td><input type="text" name="so2" value="<?php if (isset($_POST['so2'])) echo $_POST['so2']; ?>" /></td>
            </tr>
            <!-- <tr>
                <td>Kết quả:</td>
                <td><input type="text" name="kq" value="<?php if (isset($_POST['kq'])) echo $_POST['kq'];?>" /></td>
            </tr> -->
            <tr>
                <td ><input type="submit" name="tinh" value="TÍNH" /></td>
                <td align="right"><a  href="/BaocaoPHP/admin_page.php">Trở về</a></td>
            </tr>

        </table>

        </fieldset>

    </form>
    </center>



</body>

</html>