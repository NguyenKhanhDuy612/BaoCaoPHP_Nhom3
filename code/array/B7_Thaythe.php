<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay thế phần tử mảng</title>
    <link rel="stylesheet" href="/BaocaoPHP/includes/style.css">
   
</head>

<body>
<?php include('../../includes/header2.html') ?>
    <?php
    function timKiem($arr, $gtc)
    {
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] == $gtc) {
                return $i;
            }
        }
        return -1;
    }

    function thayThe(&$arr, $gtc, $gtm)
    {
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] == $gtc) {
                $arr[$i] = $gtm;
            }
        }
    }

    $str = "";
    $str_kq = "";
    $ketqua = "";

    if (isset($_POST['gtc'])) {
        $gtc = $_POST['gtc'];
    }
    if (isset($_POST['gtm'])) {
        $gtm = $_POST['gtm'];
    }

    if (isset($_POST['gtc']) && isset($_POST['tinh'])) {

        $str = $_POST['mang'];
        $arr = explode(",", $str);
        $str_kq = implode(", ", $arr);
        $vitri = timKiem($arr, $gtc);

        if ($vitri != -1) {
            thayThe($arr, $gtc, $gtm);
            $ketqua = implode(", ", $arr);
        } else {

            $ketqua = "Không tìm thấy " . $gtc . " trong mảng.";
        }
    }

    ?>
    <!-- ======================================================== -->

    <style type="text/css">
        table {
            text-transform: uppercase;
            color: black;
            font-weight: 800;
            background-color: gray;
        }

        table th {
            background-color: blue;
            font-style: vni-times;
            color: yellow;

        }
    </style>
    <!-- ======================================================== -->
    <!-- <?php include('/../BaocaoPHP/includes/header.html') ?>  -->
  
   
    <center>
    <form action="" method="post">

        <table border="0" cellpadding="0">

            <th colspan="2">
                <h2>THAY THẾ PHẦN TỬ MẢNG</h2>
            </th>
            <tr>
                <td>Nhập mảng:</td>
                <td><input type="text" name="mang" size="70" value="<?php echo $str; ?> " /></td>
            </tr>
            <tr>
                <td>Phần tử muốn thay thế:</td>
                <td><input type="text" name="gtc" size="20" value="<?php if (isset($_POST['gtc'])) echo $_POST['gtc']; ?> " /></td>
            </tr>
            <tr>
                <td>Nhập giá trị mới:</td>
                <td><input type="text" name="gtm" size="20" value="<?php if (isset($_POST['gtm'])) echo $_POST['gtm']; ?> " /></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="tinh" size="20" value="   Thay thế  " /></td>
            </tr>
            <tr>
                <td>Mảng cũ:</td>
                <td><input type="text" name="mang" size="70" disabled="disabled" value="<?php echo $str; ?> " /></td>
            </tr>
            <tr>
                <td>Mảng mới:</td>
                <td><input type="text" name="mang_kq" size="70" disabled="disabled" value="<?php echo $ketqua; ?> " /></td>
            </tr>

            <tr>
                <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
            </tr>
            <td></td>
            <tr><td align="right"><a  href="/BaocaoPHP/admin_page.php">Trở về</a></td></tr>

        </table>

    </form>
    </center>
    <?php include('../../includes/footer.html') ?>
</body>

</html>