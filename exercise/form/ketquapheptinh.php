<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính</title>
    <link rel="stylesheet" href="/includes/css/style_page.css">
</head>
<body>
<?php include('../../includes/html/header2.html') ?>
<?php


// kiểm tra dữ liệu nhập là số
if (isset($_POST['so1']))
    $so1 = trim($_POST['so1']);
else $so1 = 0;
if (isset($_POST['so2']))
    $so2 = trim($_POST['so2']);
else $so2 = 0;

if (isset($_POST['kq']))
    $kq = trim($_POST['kq']);
else $kq = 0;
if (isset($_POST['ptinh']))
    $ptinh = trim($_POST['ptinh']);
else $_POST['ptinh'] = "Vui lòng nhập phép tính";
if (isset($_POST['tinh'])) {

    if (isset($_POST['ptinh'])) {
        if ((is_numeric($so1) && is_numeric($so2))) {

            switch ($_POST['ptinh']) {
                case "Cộng": {
                        $kq = $so1 + $so2;
                        break;
                    }
                case "Trừ": {
                        $kq = $so1 - $so2;
                        break;
                    }
                case "Nhân": {
                        $kq = $so1 * $so2;
                        break;
                    }
                case "Chia": {
                        if ($so2 != 0)
                            $kq = $so1 / $so2;
                        else {
                            echo "Số chia phải khác 0!";
                            $kq = 0;
                        }
                        break;
                    }
            }
        } else {
            echo "Vui lòng nhập số!";
            $kq = 0;
        }
    } else {
        echo "Vui lòng chọn phép tinh !";
    }
} else {
    $kq = 0;
}
$_POST["kq"] = $kq;
?>

<style>
       
        td {
            width: 468px;
            width: 385px;
        }

        table {
            margin: 0 auto;

        }
    </style>
<center>
    <form action="" method="POST">
        <table border='0'>
        <thead>
                    <th colspan="2" align="center">
                        <h2>KẾT QUẢ PHÉP TÍNH 2 SỐ</h2>
                    </th>
                </thead>
            <tr>
                <td>Phép tính</td>
                <td style="color: red;">
                    <?php echo $_POST['ptinh'] ?>
                </td>
            </tr>
            </tr>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type="text" size="50" name="so1" readonly ="true" value="<?php echo $_POST['so1']; ?>" /></td>
            </tr>

            <tr>
                <td>Số thứ hai:</td>
                <td><input type="text" size="50" name="so2" readonly ="true" value="<?php echo $_POST['so2']; ?>" /></td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td><input type="text" name="kq" readonly ="true" value="<?php echo $_POST['kq'] ?>" /></td>
            </tr>
            <tr>
                
               <td><a href="./B2_Pheptinh.php"><input type="button" value="Trở về"></a></td>
            </tr>

        </table>
    </form>
</center>
<?php include('../../includes/html/footer.html') ?>
</body>
</html>