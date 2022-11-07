<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tạo và hiển thị ma trận số nguyên</title>
    <link rel="stylesheet" href="../../includes/css/style_page.css">
</head>
<body>

<?php include('../../includes/html/header2.html') ?>
	<?php 
		
		if(!isset($_POST['xl'])){
			$loid = " ";
			$loic = " ";
			$sd = " ";
			$sc = "";
			$ketqua = "";
		}
		if(isset($_POST['xl'])){
			$sd  = $_POST['sd'];
			$sc = $_POST['sc'];
			if ($sd < 2 || $sd >5 || $sc <2 || $sc >5){
				if ($sd < 2 || $sd >5) {
					$loid = "Số dòng phải bé hơn 6 và lớn hơn 1.";
				}
				elseif($sc <2 || $sc >5){
					$loic = "Số cột phải bé hơn 6 và lớn hơn 1.";
				}
			}
			else{
				// sinh mang 

				$kq = "";
				for ($i=0; $i < $sd ; $i++) { 
					for ($j=0; $j < $sc; $j++) { 
						$mang[$i][$j] = rand(-1000, 1000);
					}
				}

				for ($i=0; $i < $sd ; $i++) { 
					for ($j=0; $j < $sc; $j++) { 
						$kq .= $mang[$i][$j]." ";
					}
					$kq .= "\n";
				}

				// dong chan cot le
				$dccl = "";
				for ($i=0; $i < $sd ; $i++) { 
					for ($j=0; $j < $sc; $j++) {
						if ($i % 2 == 0 && $j % 2 == 1) {
							$dccl .= $mang[$i][$j]." ";
						}
					}
				}

				$tongbs = 0;
				for ($i=0; $i < $sd ; $i++) { 
					for ($j=0; $j < $sc; $j++) {
						if ($mang[$i][$j] % 10 == 0) {
							$tongbs += $mang[$i][$j];
						}
					}
				}
			}
			
			$ketqua = "Sinh mảng hai chiều:\n\n$kq
			\nPhần tử ở dòng chẳn cột lẻ: \n$dccl
			\nTổng các phần tử là bội số của 10: $tongbs>";

		}

	?>

	<form action="" method="post">
		<table style="margin: auto;" bgcolor="thistle" width="1025px">
			<tr bgcolor="cyan">
				<td colspan="2" align="center"> <h2>THAO TÁC TRÊN MẢNG HAI CHIỀU</h2> </td>
			</tr>
			<tr bgcolor="cyan">
				<td>Nhập số dòng: </td>
				<td><input type="text" name="sd" value="<?php echo $sd?>"></td>
			</tr>
			<tr>
				<td colspan="2"><text style="color: red"><?php if($sd < 2 || $sd >5) echo $loid;?></text></td>
			</tr>
			<tr bgcolor="cyan">
				<td>Nhập số cột: </td>
				<td><input type="text" name="sc" value="<?php echo $sc?>"></td>
			</tr>
			<tr>
				<td colspan="2"><text style="color: red"><?php if($sc < 2 || $sc >5) echo $loic;?></text></td>
			</tr>
			
			<tr>
				<td colspan="2" align="center">
					<textarea cols="20" rows="10" name="kq" style="width: 341px; height: 148px;"> 
						<?php echo $ketqua;?>
					</textarea>
				</td>
			</tr>
            <tr>
			<td><a href="../../website/exercise.php"><input type="button" value="Trở về"></a></td>
				<td><input type="submit" name="xl" value="Xử lý" style="background: cyan"></td>
                
			</tr>
          
		</table>
	</form>
    <?php include('../../includes/html/footer.html') ?>
</body>
</html>