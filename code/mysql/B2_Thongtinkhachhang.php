<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B2_Thông tin khách hàng</title>
</head>
<body>
<?php

 

// Ket noi CSDL
//require("connect.php");
$conn = mysqli_connect ('localhost', 'root', '', 'qlbansua') 
        OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
$sql = 'select Ma_Khach_Hang, Ten_Khach_hang, phai, Dia_chi,Dien_thoai from Khach_hang';
$result = mysqli_query($conn, $sql);


echo "<p align='center'><font size='5' color='blue'> THÔNG TIN KHÁCH HÀNG</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
echo '<tr>

    <th width="50">STT</th>
    <th width="150">Mã khách hàng</th>
    <th width="250">Tên khách hàng</th>
    <th width="150">Giới tính</th>
    <th width="450">Địa chỉ</th>
    <th width="150">Điện thoại</th>
    


</tr>';


$bg="#eee";
if(mysqli_num_rows($result)<>0)

{	 $stt=1;
    // $bg=='#eeeeee'
  while($rows=mysqli_fetch_row($result)) {
    $bg = (($stt%2==0) ? "#fff" : "#eee");
    
        echo "<tr bgcolor = '$bg'>";
        echo "<td>$stt</td>";
        echo "<td>$rows[0]</td>";
        echo "<td>$rows[1]</td>";
        echo "<td>$rows[2]</td>";
        echo "<td>$rows[3]</td>";
        echo "<td>$rows[4]</td>";
        echo "</tr>";
        $stt += 1;
    }
}

echo"</table>";

?>

</body>
</html>