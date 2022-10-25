<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B1_Thông tin hàng sữa</title>
</head>
<body>
<?php

 

// Ket noi CSDL
//require("connect.php");
$conn = mysqli_connect ('localhost', 'root', '', 'qlbansua') 
        OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
$sql = 'select Ten_hang_sua,Dia_chi,Dien_thoai,Email from hang_sua';
$result = mysqli_query($conn, $sql);


echo "<p align='center'><font size='5' color='blue'> THÔNG TIN HÃNG SỮA</font></P>";
echo "<table align='center' width='700' border='1' cellpadding='2' cellspacing='2' style='border-collapse:collapse'>";
echo '<tr>

    <th width="50">STT</th>
    <th width="150">Tên hãng sữa</th>
    <th width="250">Địa chỉ</th>
    <th width="150">Điện thoại</th>
    <th width="150">Email</th>


</tr>';


if(mysqli_num_rows($result)<>0)

{	 $stt=1;

  while($rows=mysqli_fetch_row($result)) {
        echo "<tr>";
        echo "<td>$stt</td>";
        echo "<td>$rows[0]</td>";
        echo "<td>$rows[1]</td>";
        echo "<td>$rows[2]</td>";
        echo "<td>$rows[3]</td>";
        echo "</tr>";
        $stt += 1;
    }
}

echo"</table>";

?>
</body>
</html>