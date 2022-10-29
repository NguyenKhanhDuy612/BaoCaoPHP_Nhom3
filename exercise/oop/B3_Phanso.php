<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3 - Phép tính trên phân số</title>
    <style>

        fieldset {

         background-color: #eeeeee;

        }
        legend {

            background-color: gray;

            color: white;

            padding: 5px 10px;

        }
        input {

            margin: 5px;

        }
        
    </style>

</head>
<body>

<?php

        class PhepToan  
        {
            protected $tu,$mau,$tu_2,$mau_2;

            public function setTu($tu){
    
                $this->tu=$tu;
        
            }
        
            public function getTu(){
        
                return $this->tu;
        
            }

            public function setMau($mau){
    
                $this->mau=$mau;
        
            }
        
            public function getMau(){
        
                return $this->mau;
        
            }

            public function setTu_2($tu_2){
    
                $this->tu_2=$tu_2;
        
            }
        
            public function getTu_2(){
        
                return $this->tu_2;
        
            }
            public function setMau_2($mau_2){
    
                $this->mau_2=$mau_2;
        
            }
        
            public function getMau_2(){
        
                return $this->mau_2;
        
            }

    protected $nhantu =" ";
    protected $nhanmau =" ";
            public function nhan(){

                $nhantu = ($this->tu * $this->tu_2);
                $nhanmau = ($this->mau*$this->mau_2);
                return $this->nhantu;

            }
            public function chia(){

                return ($this->tu * $this->mau_2)/($this->mau*$this->tu_2);

            }

            public function cong(){

                return (($this->tu * $this->mau_2)+($this->mau*$this->tu_2))/($this->mau * $this->mau_2);

            }

            public function tru(){

                return (($this->tu * $this->mau_2)-($this->mau*$this->tu_2))/($this->mau * $this->mau_2);

            }

            
        }

$str=NULL;
        if (isset($_POST['tinh'])) {
            if (($_POST['phepTinh']) && ($_POST['phepTinh']=="nhan")) {
                $nhan = new PhepToan();
                $nhan->setTu($_POST['tuSo']);
                $nhan->setMau($_POST['mauSo']);
                $nhan->setTu_2($_POST['tuSoTwo']);
                $nhan->setMau_2($_POST['mauSoTwo']);
                $str= "Phép nhân là:" 
                    .$nhan->getTu() ."/" .$nhan->getMau()
                    ." * "
                    .$nhan->getTu_2() ."/" .$nhan->getMau_2() 
                    ." = "
                    .$nhan->getTu()*$nhan->getTu_2()."/".$nhan->getMau()*$nhan->getMau_2();
            }
            if (($_POST['phepTinh']) && ($_POST['phepTinh']=="chia")) {
                $chia = new PhepToan();
                $chia->setTu($_POST['tuSo']);
                $chia->setMau($_POST['mauSo']);
                $chia->setTu_2($_POST['tuSoTwo']);
                $chia->setMau_2($_POST['mauSoTwo']);
                $str= "Phép chia là:" 
                    .$chia->getTu() ."/" .$chia->getMau()
                    ." : "
                    .$chia->getTu_2() ."/" .$chia->getMau_2() 
                    ." = "
                    .$chia->chia();
            }
            if (($_POST['phepTinh']) && ($_POST['phepTinh']=="cong")) {
                $cong = new PhepToan();
                $cong->setTu($_POST['tuSo']);
                $cong->setMau($_POST['mauSo']);
                $cong->setTu_2($_POST['tuSoTwo']);
                $cong->setMau_2($_POST['mauSoTwo']);
                $str= "Phép cộng là:" 
                    .$cong->getTu() ."/" .$cong->getMau()
                    ." + "
                    .$cong->getTu_2() ."/" .$cong->getMau_2() 
                    ." = "
                    .$cong->cong();
            }
            
            if (($_POST['phepTinh']) && ($_POST['phepTinh']=="tru")) {
                $tru = new PhepToan();
                $tru->setTu($_POST['tuSo']);
                $tru->setMau($_POST['mauSo']);
                $tru->setTu_2($_POST['tuSoTwo']);
                $tru->setMau_2($_POST['mauSoTwo']);
                $str= "Phép trừ là:" 
                    .$tru->getTu() ."/" .$tru->getMau()
                    ." - "
                    .$tru->getTu_2() ."/" .$tru->getMau_2() 
                    ." = "
                    .$tru->tru();
            }
        }
    
?>

<form action="" method="post">

<fieldset>

	<h1>Chọn các phép tính trên phân số</h1>

	<table border='0'>
		<tr>
            <td>Nhập phân số thứ 1: </td>
            <td>
                Tử số:
                <input required type="text"  name="tuSo" 
                value="<?php if(isset($_POST['tuSo'])) echo $_POST['tuSo'];?>"/>
            
                Mẫu số:
                <input required type="text"  name="mauSo" 
                value="<?php if(isset($_POST['mauSo'])) echo $_POST['mauSo'];?>"/>
            </td>
        </tr>

		<tr>
            <td>
                Nhập phân số thứ 2:
            </td>
            <td>
                Tử số:
                <input required type="text"  name="tuSoTwo" 
                value="<?php if(isset($_POST['tuSoTwo'])) echo $_POST['tuSoTwo'];?>"/>
           
                Mẫu số:
                <input required type="text"  name="mauSoTwo" 
                value="<?php if(isset($_POST['mauSoTwo'])) echo $_POST['mauSoTwo'];?>"/>
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
            <fieldset>
                        <legend>Chọn phép tính</legend>
                    <table>
                        <tr>
                            <td>
                                <input type="radio" name="phepTinh" 
                                        <?php if(isset($_POST['phepTinh'])&& $_POST['phepTinh']=='cong')
                                        echo ('checked="checked"');
                                        ?> value="cong" checked>
                                        Cộng
                            </td>
                            <td>
                                <input type="radio" name="phepTinh" 
                                    <?php if(isset($_POST['phepTinh'])&& $_POST['phepTinh']=='tru')
                                    echo ('checked="checked"');
                                    ?> value="tru" >
                                    Trừ
                            </td>
                            <td>
                                <input type="radio" name="phepTinh" 
                                        <?php if(isset($_POST['phepTinh'])&& $_POST['phepTinh']=='nhan')
                                        echo ('checked="checked"');
                                        ?> value="nhan">
                                        Nhân
                            </td>
                            <td>
                                <input type="radio" name="phepTinh" 
                                        <?php if(isset($_POST['phepTinh'])&& $_POST['phepTinh']=='chia')
                                        echo ('checked="checked"');
                                        ?> value="chia" >
                                        Chia
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>

		<tr>
            <td colspan="2" align="center">
                <input type="submit" name="tinh" value="Kết quả"/>
            </td>
        </tr>
        <tr>
			<td colspan="3"> <?php echo $str;?></td>
			<!-- <td >Phép cộng là: </td> -->
		</tr>
	</table>

</fieldset>

</form>
</body>
</html>