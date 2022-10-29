<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp xếp mảng</title>
</head>

<body>
    <!-- ======================================================== -->

    <?php # Script 9.5 - register.php #2
// This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';
include('../includes/header.html'); ?>
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

    if (isset($_POST['mang'])) 
        $mang = $_POST['mang'];
    else $mang = "";
    $str = "";
   
    if (isset($_POST['mtd'])) 
        $mtd = trim($_POST['mtd']);
    else $mtd = "";
    
    if (isset($_POST['mgd'])) 
        $mgd = trim($_POST['mgd']);
    else $mgd = "";



    if (isset($_POST['hthi'])) {
        $str = $_POST['mang'];
        $arr = explode(",", $str);
       
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

    <form action="" method="post">

        <table border="0" cellpadding="0">

            <th colspan="2">
                <h2>SẮP XẾP MẢNG</h2>
            </th>
            <tr>
                <td>Nhập mảng:</td>
                <td><input type="text" name="mang" size="70" value="<?php echo $str; ?> " /></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="hthi" size="20" value="   Sắp xếp  " /></td>
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

        </table>

    </form>
</body>

</html>