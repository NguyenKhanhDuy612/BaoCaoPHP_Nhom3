<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Các lớp đơn giản</title>
    <link rel="stylesheet" href="../Web_Template/includes/style.css">
   
</head>

<?php include ('../Web_Template/includes/header.html'); ?>
<script>
    window.onload = function() {
        document.getElementById("svzone").style.display = "none";
        document.getElementById("gvzone").style.display = "none";
        // document.getElementById('showw').innerHTML = '<h1>Nội dung thay đổi!</h1>';
    };




    function show(x) {
        if (x == 0) {
            document.getElementById("svzone").style.display = "none";
            document.getElementById("gvzone").style.display = "block";
        } else {
            document.getElementById("gvzone").style.display = "none";
            document.getElementById("svzone").style.display = "block";
        }
    }
</script>

<body>
    <?php

    abstract class Nguoi
    {
        protected $ten, $diachi, $gioitinh; // các pt của lớp con sẽ dùng đc, không kế thừa thì k đc dùng

        public function setTen($ten)
        {
            $this->ten = $ten;
        }

        public function getTen()
        {
            return $this->ten;
        }
        public function setDiachi($diachi)
        {
            $this->diachi = $diachi;
        }

        public function getDiachi($diachi)
        {
            return $this->diachi;
        }
        public function setGioitinh($gioitinh)
        {
            $this->gioitinh = $gioitinh;
        }

        public function getGioitinh($gioitinh)
        {
            return $this->gioitinh;
        }
    }

    $ketqua = "";

    class SinhVien extends Nguoi
    {
        private $lop, $nganh;
        public function getNganh($nganh)
        {
            return $this->nganh;
        }
        public function setNganh($nganh)
        {
            $this->nganh = $nganh;
        }

        public function getLop($lop)
        {
            return $this->lop;
        }
        public function setLop($lop)
        {
            $this->lop = $lop;
        }

        public function diemThuong($nganh)
        {
            $diem = 0;
            if ($nganh == "Công nghệ thông tin") {
                $diem = 1;
            } else if ($nganh == "Kinh tế") {
                $diem = 1.5;
            } else $diem = 0;

            return $diem;
        }
        public function hienthi()
        {
            return ' Sinh viên: ' . $this->ten . "\n" . ' Địa chỉ: ' . $this->diachi . "\n" . ' Ngành: ' . $this->nganh . "\n" . ' Lớp: '
                . $this->lop . "\n Giới tính: " . $this->gioitinh . "\n Điểm cộng: " . $this->diemThuong($this->nganh);
        }
    }


    class GiaoVien extends Nguoi
    {
        private $trinhdo;
        const lcb = 15000000;


        public function getTrinhdo($trinhdo)
        {
            return $this->trinhdo;
        }
        public function setTrinhdo($trinhdo)
        {
            $this->trinhdo = $trinhdo;
        }

        public function tinhLuong($trinhdo)
        {
            $luong = 0;
            switch ($trinhdo) {
                case "cunhan": {
                        $luong = 1 * self::lcb; // 2.34
                        break;
                    }
                case "tiensi": {
                        $luong = 2 * self::lcb; //5.55
                        break;
                    }
                default: {
                        $luong = 3 * self::lcb; //3.67
                        break;
                    }
            }

            return $luong;
        }


        public function hienthi()
        {
            return ' Giảng viên: ' . $this->ten . "\n" . ' Địa chỉ: ' . $this->diachi
                . "\n Giới tính: " . $this->gioitinh . "\n Lương cơ bản: " . $this->tinhLuong($this->trinhdo);
        }
    }



    if (isset($_POST['lcb'])) {
        $lcb = $_POST['lcb'];
    } else $lcb = 15000000;



    if (isset($_POST['hthi'])) {
        $a = new SinhVien(); // tạo đối tượng sịnh viên
        $a->setTen($_POST['ten']); // thêm giá trị cho các trường
        $a->setDiachi($_POST['diachi']);
        $a->setLop($_POST['lop']);
        $a->setNganh($_POST['nganhhoc']);
        $a->setGioitinh($_POST['gioitinh']);

        // gọi hàm hiển thị kết quả
        $ketqua = $a->hienthi();


        $b = new GiaoVien();
        $b->setTen($_POST['ten']); // thêm giá trị cho các trường
        $b->setDiachi($_POST['diachi']);
        $b->setGioitinh($_POST['gioitinh']);
        $b->setTrinhdo($_POST['trinhdo']);
        
        $ketqua = $b->hienthi();
       
        if ($_POST['chucvu'] == "gv") {
              $ketqua = $b->hienthi();
        } else
             $ketqua = $a->hienthi();
    }

    ?>
    <!-- ===================================================== -->

    <form action="" method="post">
        <table border="1" cellpadding="0" cellspacing="0" style="font-size:14px;margin:0 auto;" class="content">
            <tr>
                <td>
                    <table cellpadding="2" cellspacing="10">
                        <caption>
                            <h3 style="color:blue;text-transform :uppercase">Quản lí thông tin</h3>
                        </caption>
                        <tr>
                            <td>Họ tên:</td>
                            <td><input type="text" name="ten" id="" ></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td><input type="text" name="diachi" id="" ></td>
                        </tr>
                        <tr>
                            <td>Giới tính:</td>
                            <td><input type="radio" name="gioitinh" value="Nam"  />Nam

                                <input type="radio" name="gioitinh" value="Nữ" />Nữ
                        </tr>

                        <tr>
                            <!-- <tr>Thông tin chi tiết </tr> -->
                            <td>Đối tượng:</td>
                            <td>
                                <input type="radio" name="chucvu" value="gv" onclick="show(0)" class="dt" />Giảng viên

                                <input type="radio" name="chucvu" value="sv" onclick="show(1)" class="dt" />Sinh viên
                            </td>

                        </tr>

                        <tr>
                            <td></td>
                            <td style="width:300px">
                                <fieldset id="gvzone">
                                    <legend>
                                        Giảng viên
                                    </legend>

                                    <table>
                                        <tr>
                                            <td>Trình độ</td>
                                            <td><select name="trinhdo">
                                                    <option value="">--Chọn--</option>
                                                    <option value="cunhan" selected="selected">Cử nhân</option>
                                                    <option value="thacsi">Thạc sĩ</option>
                                                    <option value="tiensi">Tiến sĩ</option>
                                                </select> </td>
                                        </tr>
                                        <tr>
                                            <td>Lương cơ bản</td>
                            </td>
                            <td><input type="text" name="lcb" readonly="true" value="<?php echo $lcb ?>"></td>
                        </tr>
                    </table>
                    </fieldset>

                    <fieldset id="svzone">
                        <legend>
                            Sinh viên
                        </legend>

                        <table>

                            <tr>
                                <td>
                                    Ngành học
                                </td>
                                <td>
                                    <select name="nganhhoc">
                                        <option value="">--Chọn--</option>
                                        <option value="Công nghệ thông tin" selected="selected">Công nghệ thông tin</option>
                                        <option value="Kinh tế">Kinh tế</option>
                                        <option value="Điện tử">Điện tử</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Lớp</td>
                                <td><input type="text" name="lop" id="" ></td>
                            </tr>

                        </table>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="hthi" size="20" value="   Xử lí  " /></td>
            </tr>

        </table>
        </td>
        </tr>
        <td><textarea cols="55" rows="6" name="ketqua" readonly="true" style="resize: none;"><?php echo $ketqua ?> </textarea></td>

        </table>
    </form>

  
    <?php include ('../Web_Template/includes/footer.html'); ?>
</body>

</html>