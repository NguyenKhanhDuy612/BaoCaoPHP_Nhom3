<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma trận số nguyên</title>
    <link rel="stylesheet" href="/BaocaoPHP/includes/style.css">
</head>

<body>

<?php include('../../includes/header2.html') ?>

    <?php
    // Kiểm soát giá trị nhập vào
    if (isset($_POST['sodong']))
        $sodong = trim($_POST['sodong']);
    else $sodong = 0;
    if (isset($_POST['socot']))
        $socot = trim($_POST['socot']);
    else $socot = 0;
    if (isset($_POST['kq']))
        $kq = trim($_POST['kq']);
    else $kq = "";


    if (isset($_POST['thuchien'])) {
        if ((is_numeric($sodong) && is_numeric($socot))) {
            if ($sodong >= 2 && $sodong <= 5) {
                if ($socot >= 2 && $socot <= 5) {
                    // tạo giá trị cho các pt mảng
                    $arr = array(array());
                    $tmp = "";
                    for ($i = 0; $i < $sodong; $i++) {
                        for ($j = 0; $j < $socot; $j++) {
                            $x = rand(1, 9);
                            $arr[$i][$j] = $x;
                        }
                    }
                    // in ra mảng vừa tạo
                    for ($i = 0; $i < $sodong; $i++) {
                        for ($j = 0; $j < $socot; $j++) {
                            //echo ($arr[$i][$j] . " ");
                            $tmp .= ($arr[$i][$j] . " ");
                        }

                        // $a.="<br/>";
                        $tmp .= "\n";
                    }
                    $kq = "Ma trận được tạo là : \n" . $tmp;
                } else echo "Số cột trong khoảng [2-5] !";
            } else echo "Số dòng trong khoảng [2-5] !";
        } else {
            echo "Vui lòng nhập số!";
        }
    }
    ?>



    <!-- ========================= -->
    <center>
    <form action="" method="post">
        <table>
            <tr>

            </tr>
            <tr><h4>MA TRẬN SỐ NGUYÊN</h4></tr>
            <tr>
                <td>Số dòng</td>

            </tr>
            <tr>
                <td><input type="text" name="sodong" value="<?php if (isset($_POST['sodong'])) echo $_POST['sodong']; ?>"></td>
            </tr>
            <tr>
                <td>Số cột</td>

            </tr>
            <tr>
                <td><input type="text" name="socot" value="<?php if (isset($_POST['socot'])) echo $_POST['socot']; ?>"></td>
            </tr>
            <tr></tr>
            <td>Kết quả</td>
            <tr>
                <td><textarea name="kq" id="" cols="21" rows="10" readonly="true" style="resize: none;"><?php echo $kq  ?></textarea></td>
            </tr>
            <tr>
                <td><input type="submit" name="thuchien" value="Thực hiện"></td>
                <td><a href="/BaocaoPHP/admin_page.php">Trở về</a></td>
            </tr>
          
        </table>
    </form>
    </center>
    <?php include('../../includes/footer.html') ?>
</body>

</html>