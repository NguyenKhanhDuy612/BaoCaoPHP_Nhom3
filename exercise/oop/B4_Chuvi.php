<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Tính chu vi và diện tích</title>
    <link rel="stylesheet" href="../../includes/css/style_page.css">

    <style>
       
        table{
            margin:0 auto;
        }
        td{
            width: 385px;
        }
    </style>

</head>

<body>

<?php include('../../includes/html/header2.html') ?>
    <?php

    abstract class Hinh
    {
        protected $ten, $dodai;
        public function setTen($ten)
        {
            $this->ten = $ten;
        }

        public function getTen()
        {
            return $this->ten;
        }

        public function setDodai($doDai)
        {
            $this->dodai = $doDai;
        }

        public function getDodai()
        {

            return $this->dodai;
        }
        abstract public function tinh_CV();
        abstract public function tinh_DT();
    }

    class HinhTron extends Hinh
    {
        const PI = 3.14;
        function tinh_CV()
        {
            return $this->dodai * 2 * self::PI;
        }

        function tinh_DT()
        {
            return pow($this->dodai, 2) * self::PI;
        }
    }

    class HinhVuong extends Hinh
    {
        public function tinh_CV()
        {
            return $this->dodai * 4;
        }

        public function tinh_DT()
        {
            return pow($this->dodai, 2);
        }
    }
    class HinhChuNhat extends Hinh
    {
        public function tinh_CV()
        {
            return ($this->dodai + $this->dodai*2)*2;
        }

        public function tinh_DT()
        {
            return $this->dodai* ($this->dodai*2);
        }
    }
    class HinhTamGiacDeu extends Hinh
    {
        public function tinh_CV()
        {
            return ($this->dodai)*3;
        }

        public function tinh_DT()
        {
            return round(($this->dodai*sqrt(3))/2,2);
        }
    }

    $str = NULL;

    if (isset($_POST['tinh'])) {

        if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") {
            $hv = new HinhVuong();
            $hv->setTen($_POST['ten']);
            $hv->setDodai($_POST['dodai']);
            $str = "Diện tích hình vuông " . $hv->getTen() . " là : " . $hv->tinh_DT() . " \n" .
                "Chu vi của hình vuông " . $hv->getTen() . " là : " . $hv->tinh_CV();
        }

        if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") {
            $ht = new HinhTron();
            $ht->setTen($_POST['ten']);
            $ht->setDodai($_POST['dodai']);
            $str = "Diện tích của hình tròn " . $ht->getTen() . " là : " . $ht->tinh_DT() . " \n" .
                "Chu vi của hình tròn " . $ht->getTen() . " là : " . $ht->tinh_CV();
        }
        if (isset($_POST['hinh']) && ($_POST['hinh']) == "hcn") {
            $hcn = new HinhChuNhat();
            $hcn->setTen($_POST['ten']);
            $hcn->setDodai($_POST['dodai']);
            $str = "Diện tích của hình chữ nhật " . $hcn->getTen() . " là : " . $hcn->tinh_DT() . " \n" .
                "Chu vi của hình chữ nhật " . $hcn->getTen() . " là : " . $hcn->tinh_CV();
        }
        if (isset($_POST['hinh']) && ($_POST['hinh']) == "htg") {
            $htg = new HinhTamGiacDeu();
            $htg->setTen($_POST['ten']);
            $htg->setDodai($_POST['dodai']);
            $str = "Diện tích của hình tam giác " . $htg->getTen() . " là : " . $htg->tinh_DT() . " \n" .
                "Chu vi của hình tam giác " . $htg->getTen() . " là : " . $htg->tinh_CV();
        }
    }

    ?>
    <form action="" method="post">

        <!-- <fieldset >
            <legend>Tính chu vi và diện tích các hình học đơn giản</legend> -->
            <table border='0'>
            <th colspan="2">
                    <h2>TÍNH CHU VI VÀ DIỆN TÍCH</h2>
                </th>

                <tr>
                    <td>Chọn hình</td>
                    <td style="font-size: 17px;"><input type="radio" name="hinh" value="hv" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hv") echo 'checked="checked"' ?> />Hình vuông

                        <input type="radio" name="hinh" value="ht" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "ht") echo 'checked="checked"' ?> />Hình tròn
                        <input type="radio" name="hinh" value="hcn" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "hcn") echo 'checked="checked"' ?> />Hình chữ nhật
                        <input type="radio" name="hinh" value="htg" <?php if (isset($_POST['hinh']) && ($_POST['hinh']) == "htg") echo 'checked="checked"' ?> />Hình tam giác

                    </td>
                </tr>
                <tr>
                    <td>Nhập tên:</td>
                    <td><input type="text" size="50" name="ten" value="<?php if (isset($_POST['ten'])) echo $_POST['ten']; ?>" /></td>
                </tr>
                <tr>
                    <td>Nhập độ dài:</td>
                    <td><input type="text" name="dodai" value="<?php if (isset($_POST['dodai'])) echo $_POST['dodai']; ?>" /></td>
                </tr>
                <tr>
                    <td>Kết quả:</td>
                    <td><textarea name="ketqua" cols="50" rows="4" disabled="disabled"><?php echo $str; ?></textarea></td>
                </tr>
                <tr>
                <td><a href="../../website/exercise.php"><input type="button" value="Trở về"></a></td>
                    <td ><input type="submit" name="tinh" value="TÍNH" /></td>
                </tr>
            </table>
        <!-- </fieldset> -->
    </form>
    <?php include('../../includes/html/footer.html') ?>
</body>

</html>