<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Tính tiền điện</title>

    <style type="text/css">
        body {

            background-color: #0000;

        }

        table {

            background: cyan;

            border: 0 solid yellow;
            margin: 0 auto;

        }

        thead {

            background: cyan;

        }

        td {

            color: blue;

        }

        h3 {

            font-family: verdana;

            text-align: center;

            /* text-anchor: middle; */

            color: #ff8100;

            font-size: medium;

        }
    </style>

</head>



<body>



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
                    <h3>TÍNH TIỀN ĐIỆN</h3>
                </th>

            </thead>

            <tr>
                <td>Chủ hộ:</td>

                <td><input type="text" name="chuho" value="<?php echo $chuho; ?> " /></td>

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



                <td ><input type="submit" value="Tính" name="tinh" /></td>


                <td align="right"><a  href="/BaocaoPHP/admin_page.php">Trở về</a></td>
            </tr>



        </table>



    </form>
    </center>


</body>



</html>