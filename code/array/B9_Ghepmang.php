<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghép mảng</title>
    <link rel="stylesheet" href="/BaocaoPHP/includes/style.css">
   
</head>

<body>
<?php include('../../includes/header2.html') ?>

    <!-- ===================================================================== -->
    <?php


    function doivitri(&$a, &$b)
    {
        $tmp = $a;
        $a = $b;
        $b = $tmp;
    }

    function sapXepTang(&$arr)
    {
        for ($i = 0; $i < count($arr) - 1; $i++) {
            for ($j = $i + 1; $j < count($arr); $j++) {         # code...

                if ($arr[$i] > $arr[$j]) {
                    doivitri($arr[$i], $arr[$j]);
                }
            }
        }
    }
    function sapXepGiam(&$arr)
    {
        for ($i = 0; $i < count($arr) - 1; $i++) {
            for ($j = $i + 1; $j < count($arr); $j++) {         # code...

                if ($arr[$i] < $arr[$j]) {
                    doivitri($arr[$i], $arr[$j]);
                }
            }
        }
    }
    function demSoPhanTu($arr)
    {
        return count($arr);
    }

    if (isset($_POST['mangA'])) $mangA = $_POST['mangA'];
    else $mangA = "";
    $strA = "";
    if (isset($_POST['mangB'])) $mangB = $_POST['mangA'];
    else $mangB = "";
    $strB = "";
    if (isset($_POST['mtd'])) $mtd = $_POST['mtd'];
    else $mtd = "";
    if (isset($_POST['mgd'])) $mgd = $_POST['mgd'];
    else $mgd = "";
    if (isset($_POST['mdg'])) $mdg = $_POST['mdg'];
    else $mdg = "";
    if (isset($_POST['mgd'])) $mgd = $_POST['mgd'];
    else $mgd = "";
    if (isset($_POST['countA'])) $countA = $_POST['countA'];
    else $countA = "";
    if (isset($_POST['countB'])) $countB = $_POST['countB'];
    else $countB = "";





    if (isset($_POST['hthi'])) {
        $strA = trim($_POST['mangA']);
        $arrA = explode(",", $strA);
        $countA = demSoPhanTu($arrA);

        $strB = trim($_POST['mangB']);
        $arrB = explode(",", $strB);
        $countB = demSoPhanTu($arrB);

        $arr = array_merge($arrA, $arrB);
        $mdg = implode(", ", $arr);

        sapXepTang($arr);
        $mtd = implode(", ", $arr);
        sapXepGiam($arr);
        $mgd = implode(", ", $arr);
    }
    ?>

    <!-- ============================================================ -->
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
            color: cyan;

        }
    </style>
    <!-- ======================================================== -->

    <center>
        <form action="" method="post">

            <table border="0" cellpadding="0">

                <th colspan="2">
                    <h2>GHÉP MẢNG</h2>
                </th>
                <tr>
                    <td>Nhập mảng A:</td>
                    <td><input type="text" name="mangA" size="70" value="<?php echo $strA; ?> " /></td>
                </tr>
                <tr>
                    <td>Nhập mảng B:</td>
                    <td><input type="text" name="mangB" size="70" value="<?php echo $strB; ?> " /></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" name="hthi" size="20" value="   Thực hiện  " /></td>
                </tr>
                <tr>
                <tr>
                    <td>Số phần tử mảng A:</td>
                    <td><input type="text" name="countA" value="<?php echo $countA; ?> " /></td>
                </tr>
                <tr>
                    <td>Số phần tử mảng B:</td>
                    <td><input type="text" name="countB" value="<?php echo $countB; ?> " /></td>
                </tr>
                <td>Mảng C: </td>
                <td><input type="text" name="mdg" size="70" disabled="disabled" value="<?php echo $mdg; ?> " /></td>
                </tr>
                <tr>
                    <td>Mảng tăng dần: </td>
                    <td><input type="text" name="mtd" size="70" disabled="disabled" value="<?php echo $mtd; ?> " /></td>
                </tr>
                <tr>
                    <td>Mảng giảm dần: </td>
                    <td><input type="text" name="mgd" size="70" disabled="disabled" value="<?php echo $mgd; ?> " /></td>
                </tr>

                <tr>
                    <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
                </tr>
                <tr>
                    <td align="right"><a href="/BaocaoPHP/admin_page.php">Trở về</a></td>
                </tr>

            </table>

        </form>
    </center>
    <?php include('../../includes/footer.html') ?>
</body>

</html>