<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sắp xếp mảng</title>
    <link rel="stylesheet" href="../../includes/css/style_page.css">

</head>

<body>
<?php include('../../includes/html/header2.html') ?>
    <!-- ======================================================== -->

    <style type="text/css">
        td {
            width: 385px;
        }
        table{
            margin: 0 auto;
        }
    </style>
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

  
    <!-- ======================================================== -->

    <form action="" method="post">

        <table border="0" cellpadding="0">

            <th colspan="2">
                <h2>SẮP XẾP MẢNG</h2>
            </th>
            <tr>
                <td>Nhập mảng:</td>
                <td><input type="text" name="mang" size="50" value="<?php echo $str; ?> " /></td>
            </tr>

            <tr>
                <td></td>
                <td><input type="submit" name="hthi" size="20" value="   Sắp xếp  " /></td>
            </tr>
            <tr>
                <td>Mảng tăng dần: </td>
                <td><input type="text" name="mtd" size="50" disabled="disabled" value="<?php echo $mtd; ?> " /></td>
            </tr>
            <tr>
                <td>Mảng giảm dần: </td>
                <td><input type="text" name="mgd" size="50" disabled="disabled" value="<?php echo $mgd; ?> " /></td>
            </tr>

            <tr>
            <td><a href="/website/exercise.php"><input type="button" value="Trở về"></a></td>
                <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>
            </tr>

        </table>

    </form>
    <?php include('../../includes/html/footer.html') ?>
</body>

</html>