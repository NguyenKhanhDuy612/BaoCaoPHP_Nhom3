<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Phép tính trên phân số</title>
    <link rel="stylesheet" href="../../includes/css/style_page.css">
</head>
<body>
<?php include('../../includes/html/header2.html') ?>
<style>
    table td {
        padding-left: 0;
    }
</style>
	<?php 

		class phanSo{
			protected $ts, $ms;

			public function setTu($ts)
	        {
	            $this->ts = $ts;
	        }
	        public function getTu()
	        {
	            return $this->ts;
	        }

			public function setMau($ms)
	        {
	            $this->ms = $ms;
	        }
	        public function getMau()
	        {
	            return $this->ms;
	        }

	        function ucln($ts, $ms){
	        	$ts=abs($ts);
	        	$ms=abs($ms);
	        	while ($ts*$ms != 0) {
	        		if ($ts > $ms) {
	        			$ts%=$ms;
	        		}
	        		else
	        			$ms%=$ts;
	        	}
	        	return $ts + $ms;
	        }

	        function rutGonPS(){
	        	$uc = $this->ucln($this->ts, $this->ms);
	        	$this->ts = $this->ts / $uc;
	        	$this->ms = $this->ms / $uc;
	        }

	        function congPS($ts, $ms){
	        	$this->ts = $this->ts*$ms + $this->ms*$ts;
	        	$this->ms = $this->ms * $ms;
	        	$this->rutGonPS();
	        }

	        function truPS($ts, $ms){
	        	$this->ts = $this->ts*$ms - $this->ms*$ts;
	        	$this->ms = $this->ms * $ms;
	        	$this->rutGonPS();
	        }

	        function nhanPS($ts, $ms){
	        	$this->ts = $this->ts * $ts;
	        	$this->ms = $this->ms * $ms;
	        	$this->rutGonPS();
	        }

	        function chiaPS($ts, $ms){
	        	$this->ts = $this->ts*$ms;
	        	$this->ms = $this->ms * $ts;
	        	$this->rutGonPS();
	        }

		}
		
		$kq = "";

		if (isset($_POST['xl'])) {

			if (empty($_POST['ts1']) || empty($_POST['ms1']) || empty($_POST['ts2']) || empty($_POST['ms2']) || $_POST['ms1']==0 || $_POST['ms2']==0) {
				if(empty($_POST['ts1']))
					$kq.="<p style='color: red'>"."Tử số 1 chưa được điền. "."</p>";
				if (empty($_POST['ms1']))
					$kq.="<p style='color: red'>"."Mẫu số 1 chưa được điền hoặc điền chưa hợp lệ. "."</p>";
				if (empty($_POST['ts2']))
					$kq.="<p style='color: red'>"."Tử số 2 chưa được điền. "."</p>";
				if (empty($_POST['ms2']))
					$kq.="<p style='color: red'>"."Mẫu số 2 chưa được điền hoặc điền chưa hợp lệ. "."</p>";
				if ($_POST['ms1']==0)
					$kq.="<p style='color: red'>"."Mẫu số 1 không được bằng 0. "."</p>";
				if ($_POST['ms2']==0)
					$kq.="<p style='color: red'>"."Mẫu số 2 không được bằng 0. "."</p>";
			}
			else{

				$ps1 = new phanSo();

				$ps1->setTu($_POST['ts1']);
				$ps1->setMau($_POST['ms1']);

				$ps1->rutGonPS();

				$ps2 = new phanSo();

				$ps2->setTu($_POST['ts2']);
				$ps2->setMau($_POST['ms2']);

				$ps2->rutGonPS();

				switch ($_POST['tt']) {
					case 'Cộng':
						$kq .= $_POST['tt'].": ";
						$kq .= $ps1->getTu()."/".$ps1->getMau()." + ".$ps2->getTu()."/".$ps2->getMau()." = ";
						$ps1->congPS($ps2->getTu(),$ps2->getMau());
						if($ps1->getTu()==0)
							$kq.= 0;
						elseif ($ps1->getTu() == $ps1->getMau())
							$kq .= 1;
						else
							$kq.= $ps1->getTu()."/".$ps1->getMau();
						break;
					
					case 'Trừ':
						$kq .= $_POST['tt'].": ";
						$kq .= $ps1->getTu()."/".$ps1->getMau()." - ".$ps2->getTu()."/".$ps2->getMau()." = ";
						$ps1->truPS($ps2->getTu(),$ps2->getMau());
						if($ps1->getTu()==0)
							$kq.=0;
						elseif ($ps1->getTu() == $ps1->getMau())
							$kq .= 1;
						else
							$kq.= $ps1->getTu()."/".$ps1->getMau();
						break;

					case 'Nhân':
						$kq .= $_POST['tt'].": ";
						$kq .= $ps1->getTu()."/".$ps1->getMau()." * ".$ps2->getTu()."/".$ps2->getMau()." = ";
						$ps1->nhanPS($ps2->getTu(),$ps2->getMau());
						if($ps1->getTu()==0)
							$kq.=0;
						elseif ($ps1->getTu() == $ps1->getMau())
							$kq .= 1;
						else
							$kq.= $ps1->getTu()."/".$ps1->getMau();
						break;

					case 'Chia':
						$kq .= $_POST['tt'].": ";
						$kq .= $ps1->getTu()."/".$ps1->getMau()." / ".$ps2->getTu()."/".$ps2->getMau()." = ";
						$ps1->chiaPS($ps2->getTu(),$ps2->getMau());
						if($ps1->getTu()==0)
							$kq.=0;
						elseif ($ps1->getTu() == $ps1->getMau())
							$kq .= 1;
						else
							$kq.= $ps1->getTu()."/".$ps1->getMau();
						break;
				}
			}
		}

	?>


	<form action="" method="post" > 
		<table style="width: 981px; margin-left: auto; margin-right: auto; border: 1px solid #000000;">
			<tr>
				<td>
					<table style="width: 1022px; margin:0 auto; border-spacing: 10px 30px;">
						<caption style="background-color: #AFEEEE">
							<h2>CHỌN CÁC PHÉP TÍNH TRÊN PHÂN SỐ</h2>
						</caption>
						<tr>
							<td>Nhập phân số thứ 1: </td>
							<td>Tử số: <input type="text" name="ts1"></td>
							<td>Mẫu số: <input type="text" name="ms1"></td>
						</tr>
						<tr>
							<td>Nhập phân số thứ 2: </td>
							<td>Tử số: <input type="text" name="ts2"></td>
							<td>Mẫu số: <input type="text" name="ms2"></td>
						</tr>
						<tr>
							<td colspan="3">
								<fieldset>
									<legend>Chọn phép tính</legend>
									<input type="radio" name="tt" value="Cộng" checked> Cộng
									&nbsp;&nbsp;
									<input type="radio" name="tt" value="Trừ"> Trừ
									&nbsp;&nbsp;
									<input type="radio" name="tt" value="Nhân"> Nhân
									&nbsp;&nbsp;
									<input type="radio" name="tt" value="Chia"> Chia
								</fieldset>
							</td>
						</tr>
						<tr>
                        <td><a href="../../website/exercise.php"><input type="button" value="Trở về"></a></td>
							<td colspan="3" align="center" ><input type="submit" name="xl" value="Kết quả"></td>
						</tr>
						<tr>
							<td colspan="2">
								<?php echo $kq;?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
           

		</table>
	</form>
    <?php include('../../includes/html/footer.html') ?>
</body>
</html>