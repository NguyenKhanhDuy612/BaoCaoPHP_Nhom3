<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng dãy số nguyên</title>
    <link rel="stylesheet" href="../../includes/css/style_page.css">

</head>

<body>
    <?php include('../../includes/html/header2.html') ?>

    <?php

    function tong($arr)
    {
        $tong = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $tong += $arr[$i];
        }
        return $tong;
        // echo "Tổng các số âm trong mảng là : $tong";
    }


    $str = "";

    $str_kq = "";

    $ketqua = "";

    if (isset($_POST['tinh'])) {

        $str = trim($_POST['mang']);

        $arr = explode(",", $str);

        $str_kq = implode(",", $arr);
        $ketqua  = tong($arr);
    }
    ?>

<style type="text/css">
        td {
            width: 385px;
        }
    </style>

    <center>
        <form action="" method="post">

            <table border="0" cellpadding="0">

                <th colspan="2">
                    <h2>TÍNH TỔNG DÃY SỐ</h2>
                </th>

                <tr>
                    <td>Nhập mảng:</td>
                    <td><input type="text" name="mang" size="50" value="<?php echo $str; ?> " /></td>
                </tr>

                <tr>
                    <td>Mảng:</td>
                    <td><input type="text" name="mang_kq" size="40" disabled="disabled" value="<?php echo $str_kq; ?> " /></td>
                </tr>
                <td>Kết quả </td>
                <td><input type="text" name="kq" size="10" disabled="disabled" value="<?php echo $ketqua; ?> " /></td>

                </tr>
                <tr>
                    <td ><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
                </tr>
                <tr>

                <td><a href="../../website/exercise.php"><input type="button" value="Trở về"></a></td>
                    <td><input type="submit" name="tinh" size="20" value="Tính" /></td>
                    
                </tr>
            </table>

        </form>
    </center>
    <?php include('../../includes/html/footer.html') ?>
</body>

</html>