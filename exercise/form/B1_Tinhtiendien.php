<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Tính tiền điện</title>

    <link rel="stylesheet" href="../../includes/css/style_page.css">
    
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

    <?php
    if (isset($_POST['csmoi']))
        $csmoi = trim($_POST['csmoi']);
    else $csmoi = 0;
    if (isset($_POST['cscu']))
        $cscu = trim($_POST['cscu']);
    else $cscu = 0;
    if (isset($_POST['dongia']))
        $dongia = trim($_POST['dongia']);
    else $dongia = 0;
    if (isset($_POST['tien']))
        $dongia = trim($_POST['tien']);
    else $tien = 0;
    if (isset($_POST['chuho']))
        $chuho = trim($_POST['chuho']);
    else {

        $chuho = "";
    }

    if (isset($_POST['tinh'])) {
        if (($chuho)) {
            if (is_numeric($csmoi) && is_numeric($cscu)) {
                if ($csmoi > $cscu)

                    $tien = ($csmoi - $cscu) * $dongia;
                else {
                    echo "<font color='red'>Chỉ số mới phải lớn hơn chỉ số cũ </font>";
                    $tien = 0;
                }
            } else {

                echo "<font color='red'>Vui lòng nhập vào số! </font>";
                $tien = "";
            }
        } else
            echo "<font color='red'>Vui lòng nhập tên chủ hộ </font>";
    }

    ?>

    <center>
        <form align='center' action="" method="post">
            <table>
                <thead>
                    <th colspan="2" align="center">
                        <h2>TÍNH TIỀN ĐIỆN</h2>
                    </th>
                </thead>
                <tr>
                    <td>Chủ hộ:</td>

                    <td><input type="text" size="50" name="chuho" value="<?php echo $chuho; ?> " /></td>
                </tr>
                <tr>
                    <td>Chỉ số mới:</td>
                    <td><input type="text" name="csmoi" value="<?php echo $csmoi; ?> " /></td>
                </tr>
                <tr>
                    <td>Chỉ số cũ:</td>
                    <td><input type="text" name="cscu" value="<?php echo $cscu; ?> " /></td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td><input type="text" name="dongia" value="<?php echo $dongia; ?> " /></td>
                </tr>
                <tr>
                    <td>Tổng tiền:</td>
                    <td><input type="text" name="tien" disabled="disabled" value="<?php echo $tien; ?> " /></td>
                </tr>
                <tr>
                   
                    <td><a href="../../website/exercise.php"><input type="button" value="Trở về"></a></td>
                    <td><input type="submit" value="   Tính   " name="tinh" /></td>
                </tr>
            </table>
        </form>
    </center>


    <?php include('../../includes/html/footer.html') ?>
</body>



</html>