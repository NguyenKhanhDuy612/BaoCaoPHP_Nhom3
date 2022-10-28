<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Min max trong mảng</title>
    <link rel="stylesheet" href="/includes/style.css">

</head>

<body>
    <?php include('../../includes/header2.html') ?>
    <?php
    function taoMang()
    {
        $n = $_POST['n'];
        $arr = array();
        for ($i = 0; $i < $n; $i++) {
            $x = rand(0, 20);
            $arr[$i] = $x;
        }
    
        return $arr;
    }

    function tong($arr)
    {
        $tong = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $tong += $arr[$i];
        }
        return $tong;
    }

    function timmin($arr)
    {
        $min = $arr[0];
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] < $min) {
                $min = $arr[$i];
            }
        }
        return $min;
    }
    function timmax($arr)
    {
        $max = $arr[0];
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] > $max) {
                $max = $arr[$i];
            }
        }
        return $max;
    }

    if (isset($_POST['n'])) $n = $_POST['n'];
    else $n = 0;
    if (isset($_POST['minn'])) $min = $_POST['minn'];
    else $min = 0;
    if (isset($_POST['maxx'])) $max = $_POST['maxx'];
    else $max = 0;
    if (isset($_POST['sum'])) $sum = $_POST['sum'];
    else $sum = 0;
    if (isset($_POST['mang_kq'])) $mang_ketqua = $_POST['mang_kq'];
    else $mang_ketqua = "";



    if (isset($_POST['tinh']) && isset($_POST['n'])) {
        $mangduoctao = taoMang();
        $mang_ketqua = implode(" ", $mangduoctao) . "&#13;&#10;";
        $sum = tong($mangduoctao);
        $max = timmax($mangduoctao);
        $min = timmin($mangduoctao);
    }
    ?>


    <center>

        <form action="" method="post">

            <table border="0" cellpadding="0">

                <th colspan="2">
                    <h2>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h2>
                </th>

                <tr>

                    <td>Nhập số phần tử:</td>
                    <td><input type="text" name="n" size="30" value="<?php echo $n; ?> " /></td>

                </tr>
                <tr>

                    <td></td>

                    <td><input type="submit" name="tinh" size="20" value="Phát sinh mảng và tính toán" /></td>

                </tr>

                <tr>

                    <td>Mảng:</td>

                    <td><input type="text" name="mang_kq" size="70" disabled="disabled" value="<?php echo $mang_ketqua; ?> " /></td>

                </tr>
                <td>GTLN trong mảng:</td>

                <td><input type="text" name="maxx" size="70" disabled="disabled" value="<?php echo $max; ?> " /></td>

                </tr>
                </tr>
                <td>GTNN trong mảng:</td>

                <td><input type="text" name="minn" size="70" disabled="disabled" value="<?php echo $min; ?> " /></td>

                </tr>
                </tr>
                <td>Tổng các phần tử:</td>

                <td><input type="text" name="sum" size="70" disabled="disabled" value="<?php echo $sum; ?> " /></td>

                </tr>
                <tr>
                    <td><a href="/exercise.php"><input type="button" value="Trở về"></a></td>
                </tr>


            </table>

        </form>
    </center>
    <?php include('../../includes/footer.html') ?>
</body>

</html>