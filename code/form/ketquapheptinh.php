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

<center>
    <form action="" method="POST">
        <table border='0'>
            <h3>Phép tính với 2 số</h3>
            <tr>
                <td>Phép tính</td>
                <td>
                    <?php echo $_POST['ptinh'] ?>
                </td>
            </tr>
            </tr>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type="text" name="so1" value="<?php echo $_POST['so1']; ?>" /></td>
            </tr>

            <tr>
                <td>Số thứ hai:</td>
                <td><input type="text" name="so2" value="<?php echo $_POST['so2']; ?>" /></td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td><input type="text" name="kq" value="<?php echo $_POST['kq'] ?>" /></td>
            </tr>
            <tr>
                <a href="pheptinh.php">Trở về </a>
            </tr>

        </table>
    </form>
</center>