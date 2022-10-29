<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý nhân viên</title>
</head>

<body>
<script>

    function show(x) {
        if (x == "0") {
            document.getElementById("ssp").disabled = true;
            document.getElementById("ssp").value = 0;
            document.getElementById("snv").disabled = false;
            document.getElementById("stp").disabled = false;
        } else {
            document.getElementById("ssp").disabled = false;
            document.getElementById("snv").disabled = true;
            document.getElementById("stp").disabled = true;
            document.getElementById("snv").value = 0;
            
        }
    }
</script>
    <!-- ======================================== -->
    <?php
    abstract class NhanVien
    {
        // họ tên, giới tính, ngày vào làm, hệ số lương, số con, lương căn bản
        protected $ten, $gt, $ns, $nvl, $hsl, $sc;
        protected $lcb = 5000000;
        #region Getter, Setter
        public function setTen($ten)
        {
            $this->ten = $ten;
        }
        public function getTen()
        {
            return $this->ten;
        }
        public function setGioitinh($gt)
        {
            $this->gt = $gt;
        }

        public function getGioitinh($gt)
        {
            return $this->gt;
        }
        public function setNgayvaolam($nvl)
        {
            $this->nvl = $nvl;
        }

        public function getNgayvaolam($nvl)
        {
            return $this->nvl;
        }
        public function setNgaysinh($ns)
        {
            $this->ns = $ns;
        }

        public function getNgaysinh($ns)
        {
            return $this->ns;
        }
        public function setHesoluong($hsl)
        {
            $this->hsl = $hsl;
        }

        public function gethesoluong($hsl)
        {
            return $this->hsl;
        }
        public function setSocon($sc)
        {
            $this->sc = $sc;
        }

        public function getSocon($sc)
        {
            return $this->sc;
        }

        public function setLuongcoban($lcb)
        {
            $this->lcb = $lcb;
        }

        public function getLuongcoban($lcb)
        {
            return $this->lcb;
        }
        #endregion
        public function __construct($ten, $gt, $ns, $nvl, $hsl, $sc)
        {
            $this->ten = $ten;
            $this->gt = $gt;
            $this->ns = $ns;
            $this->nvl = $nvl;
            $this->hsl = $hsl;
            $this->sc = $sc;
            // $this->lcb = $lcb;
        }

        abstract public function tinhLuong();
        abstract public function tinhTrocap();

        public function tinhThuong($nvl)
        {
        }
    }


    #region Nhân viên văn phòng
    
    class NhanVienVanPhong extends NhanVien
    {
        // số ngày vắng, định mức vắng, đơn giá phạ
        private $snvang;
        private $dmvang = 4;
        private $dgphat = 50000;


        public function setSongayvang($snvang)
        {
            $this->snvang = $snvang;
        }
        public function getSongayvang()
        {
            return $this->snvang;
        }

        public function setDinhmucvang($dmvang)
        {
            $this->dmvang = $dmvang;
        }
        public function getDinhmucvang()
        {
            return $this->dmvang;
        }

        public function setDongiaphat($dgphat)
        {
            $this->dgphat = $dgphat;
        }
        public function getDongiaphat()
        {
            return $this->dgphat;
        }

        // $nv = new NhanVienVanPhong();
        function tinhLuong()
        {
            return $this->lcb * $this->hsl - $this->tinhPhat();
        }

        function tinhThuong($nvl)
        {

            // 00/00/2000
            $thamnien = (int)(substr($nvl, 0, 4));
            // $thamnien = (int)(right())

            $now = getdate();
            $thisyear = $now["year"];


            return ($thisyear - $thamnien) * 1000000;
            // return $thamnien;
        }
        function tinhTrocap()
        {
            // $nv = new NhanVienVanPhong();
            if ($this->gt == "Nữ") {
                return 1.5 * $this->sc * 200000;
            }
            return $this->sc * 200000;
        }
        function tinhPhat()
        {
            if ($this->snvang > $this->dmvang) {
                return ($this->snvang) * $this->dgphat;
            }
            return 0;
        }
        function thucLinh($nvl)
        {
            return $this->tinhLuong() + $this->tinhThuong($nvl) + $this->tinhTrocap();
        }
    }
    #endregion

    #region Nhân viên sản xuất
    class NhanVienSanXuat extends NhanVien
    {
        // số ngày vắng, định mức vắng, đơn giá phạ
        private $ssp;
        private $dmsp = 50;
        private $dgsp = 20000;


        public function setSosanpham($ssp)
        {
            $this->ssp = $ssp;
        }
        public function getSosanpham()
        {
            return $this->ssp;
        }

        public function setDinhmucsanpham($dmsp)
        {
            $this->dmsp = $dmsp;
        }
        public function getDinhmucsanpham()
        {
            return $this->dmsp;
        }

        public function setDongiasanpham($dgsp)
        {
            $this->dgsp = $dgsp;
        }
        public function getDongiasanpham()
        {
            return $this->dgphdgspat;
        }

      
        function tinhLuong()
        {
            return $this->tinhThuong2()+($this->ssp *$this->dgsp) ;
        }

        function tinhThuong2()
        {
            if($this->ssp>$this->dmsp){
                return ($this->ssp - $this->dmsp) *$this->dgsp*0.03;
            }
            
            // return $thamnien;
        }
        function tinhTrocap()
        {
            return $this->sc * 120000;
        }
        
        function thucLinh()
        {
            return $this->tinhLuong() + $this->tinhThuong2() + $this->tinhTrocap();
        }
    }
    #endregion


    #region  Sticky Form
    if (isset($_POST["tienluong"])) $tienluong = $_POST["tienluong"];
    else $tienluong = 0;
    if (isset($_POST["tienthuong"])) $tienthuong = $_POST["tienthuong"];
    else $tienthuong = 0;
    if (isset($_POST["tienphat"])) $tienphat = $_POST["tienphat"];
    else $tienphat = 0;
    if (isset($_POST["trocap"])) $trocap = $_POST["trocap"];
    else $trocap = 0;
    if (isset($_POST["thuclinh"])) $thuclinh = $_POST["thuclinh"];
    else $thuclinh = 0;
    if (isset($_POST["sosanpham"])) $ssp = $_POST["sosanpham"];
    else $ssp = 0;
    #endregion


    #region Xử lí form
    if (isset($_POST['hthi'])) {
        $pb = $_POST['pb'];
        $ten = $_POST['ten'];
        $gt = $_POST['gioitinh'];
        $nvl = $_POST['ngvaolam'];
        $ns = $_POST['ngsinh'];
        $hsl = $_POST['hsluong'];
        $sc = $_POST['socon'];
        // $ssp = $_POST['sosanpham'];
        // $lcb = 5000000;

        if($pb == "vp"){
            // $nv = new NhanVienVanPhong();
            // $nv->__construct();
            $nhanvien1 = new NhanVienVanPhong($ten, $gt, $ns, $nvl, $hsl, $sc);

            $nhanvien1->setSongayvang($_POST['songayvang']);
    
            // $snv = $_POST["snv"];
            
            $tienphat = $nhanvien1->tinhPhat();
            $trocap = $nhanvien1->tinhTrocap();
            $tienluong = $nhanvien1->tinhLuong();
            $tienthuong = $nhanvien1->tinhThuong($nvl);
            $thuclinh = $nhanvien1->thucLinh($nvl);
    
            $tienphat = number_format($tienphat,0,',','.')." VNĐ";
            $tienthuong = number_format($tienthuong,0,',','.')." VNĐ";
            $trocap = number_format($trocap,0,',','.')." VNĐ";
            $tienluong = number_format($tienluong,0,',','.')." VNĐ";
            $thuclinh = number_format($thuclinh,0,',','.')." VNĐ";

        }else
        {
            $ssp = $_POST['sosanpham'];
            if (isset($_POST["sosanpham"])) $ssp = $_POST["sosanpham"];
            else $ssp = 0;
            $nhanvien2 = new NhanVienSanXuat($ten, $gt, $ns, $nvl, $hsl, $sc);
            $nhanvien2->setSosanpham($_POST['sosanpham']);
            // $tienphat = $nhanvien2->tinhPhat();
            $trocap = $nhanvien2->tinhTrocap();
            $tienluong = $nhanvien2->tinhLuong();
            $tienthuong = $nhanvien2->tinhThuong2();
            $thuclinh = $nhanvien2->thucLinh();
    
            $tienphat = 0;
            $tienthuong = number_format($tienthuong,0,',','.')." VNĐ";
            $trocap = number_format($trocap,0,',','.')." VNĐ";
            $tienluong = number_format($tienluong,0,',','.')." VNĐ";
            $thuclinh = number_format($thuclinh,0,',','.')." VNĐ";
        }

       

       
    }
    #endregion

    ?>
    <!-- ======================================== -->
    <style>
        .form2 {
            text-align: center;
        }

        #mainform {
            background-color: cornsilk;
            font-size: 16px;
            font-weight: 600;
        }

        caption {
            color: blue;
            text-transform: uppercase;
            background-color: antiquewhite;
        }

        #btn {
            background-color: antiquewhite;
            text-transform: uppercase;
            padding: 12px;
            color: blue;
            font-weight: 700;

        }
    </style>
    <!-- ======================================== -->
    <form action="" method="post">
        <table border="1" cellpadding="0" cellspacing="0" style="font-size:14px;margin:0 auto;" class="content">
            <tr>
                <td>
                    <table cellpadding="2" cellspacing="10" id="mainform">
                        <caption>
                            <h3>QUẢN LÝ NHÂN VIÊN</h3>
                        </caption>
                        <tr>
                            <td>Họ tên:</td>
                            <td><input type="text" name="ten" id="" value="<?php if (isset($_POST['ten'])) echo $ten ?>"></td>

                            <td>Số con:</td>
                            <td><input type="text" name="socon" size="10" id="" value="<?php if (isset($_POST['socon'])) echo $sc ?>"></td>
                        </tr>


                        <tr>
                            <td>Ngày sinh:</td>

                            <td><input type="date" name="ngsinh" id="" value="<?php if (isset($_POST['ngsinh'])) echo $ns ?>"></td>
                            <td>Ngày vào làm:</td>
                            <td><input type="date" name="ngvaolam" id="" value="<?php if (isset($_POST['ngvaolam'])) echo $nvl ?>"></td>
                        </tr>
                        <tr>
                            <td>Giới tính:</td>
                            <td><input type="radio" name="gioitinh" value="Nam" <?php if (isset($_POST['gioitinh']) && ($_POST['gioitinh']) == "Nam") echo 'checked="checked"' ?> />Nam

                                <input type="radio" name="gioitinh" value="Nữ" <?php if (isset($_POST['gioitinh']) && ($_POST['gioitinh']) == "Nữ") echo 'checked="checked"' ?> />Nữ
                            </td>
                            <td>Hệ số lương:</td>
                            <td><input type="text" name="hsluong" size="10" id="" value="<?php if (isset($_POST['hsluong'])) echo $hsl ?>"></td>
                        </tr>
                        <tr>
                            <td>Phòng ban:</td>
                            <td><input type="radio" class="pb" name="pb"  onclick="show(0)" value="vp" <?php if (isset($_POST['pb']) && ($_POST['pb']) == "vp") echo 'checked="checked"' ?> />Văn phòng</td>
                            <td>
                                <input type="radio" class="pb" name="pb"  onclick="show(1)" value="sx" <?php if (isset($_POST['pb']) && ($_POST['pb']) == "sx") echo 'checked="checked"' ?> />Sản xuất
                            </td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>Số ngày vắng <input type="text" name="songayvang" size="10" id="snv" value="<?php if (isset($_POST['songayvang'])) echo $_POST['songayvang'] ?>"></td>

                            <td>Số sản phẩm <input type="text" name="sosanpham" size="10" id="ssp" value="<?php if (isset($_POST['sosanpham'])) echo $_POST['sosanpham'] ?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><input type="submit" value="Tính lương" id="btn" name="hthi"></td>
                        </tr>
                        <tr>
                            <td class="form2">Tiền lương</td>
                            <td><input type="text" name="tienluong" size="20" id="" readonly="true" value="<?php if (isset($_POST["tienluong"])) echo $tienluong ?>"></td>
                            <td class="form2">Trợ cấp</td>
                            <td><input type="text" name="trocap" size="20" id="" readonly="true" value="<?php if (isset($_POST["trocap"])) echo $trocap ?>"></td>
                        </tr>
                        <tr>
                            <td class="form2">Tiền thưởng</td>
                            <td><input type="text" name="tienthuong" size="20" id="" readonly="true" value="<?php if (isset($_POST["tienthuong"])) echo $tienthuong ?>"></td>
                            <td class="form2">Tiền phạt</td>
                            <td><input type="text" name="tienphat" size="20" id="tp" readonly="true" value="<?php if (isset($_POST["tienphat"])) echo $tienphat ?>"> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td class="form2">Thực lĩnh</td>
                            <td><input type="text" name="thuclinh" id="" readonly="true" value="<?php if (isset($_POST["thuclinh"])) echo $thuclinh ?>"></td>
                        </tr>
                    </table>


                </td>
            </tr>

        </table>




    </form>
</body>

</html>