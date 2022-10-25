<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">

<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Mang tim kiem va thay the</title>

<style type="text/css">

    table{

        color: #ffff00;

        background-color: gray;     

    }

    table th{

        background-color: blue;

        font-style: vni-times;

        color: yellow;

    }

</style>
<link rel="stylesheet" href="/includes/style.css">
</head>


<body>
 
<?php include('../../includes/header2.html') ?>

<?php 

function tim_kiem($arr,$so){

    for($i=0;$i<count($arr);$i++){

        if($arr[$i]==$so){

            return $i;

        }

    }

    return -1;

}

$str="";

$str_kq="";

$ketqua="";

if(isset($_POST['so'])){

    $so=$_POST['so'];

}

if(isset($_POST['so']) && isset($_POST['tinh'])){

    $str=trim($_POST['mang']);

    $arr=explode(",",$str);

    $str_kq=implode(",",$arr);

    $vitri=tim_kiem($arr,$so);

    if($vitri!=-1){

        $ketqua="Tìm thấy ".$so." tại vị trí thứ ". $vitri ." của mảng.";

    }

    else{

        $ketqua="Không tìm thấy ".$so." trong mảng.";

    }

}

?>
<center>
<form action="" method="post">

<table border="0" cellpadding="0">

    <th colspan="2"><h2>TÌM KIẾM</h2></th>

    <tr>

        <td>Nhập mảng:</td>

        <td><input type="text" name="mang" size= "70" value="<?php echo $str;?> "/></td>

    </tr>

    <tr>

        <td>Nhập số cần tìm:</td>

        <td><input type="text" name="so" size="20" value="<?php if(isset($_POST['so'])) echo $_POST['so'];?> "/></td>

    </tr>

    <tr>

        <td></td>

        <td><input type="submit" name="tinh"  size="20" value="   Tìm kiếm  "/></td>

    </tr>

    <tr>

        <td>Mảng:</td>

        <td><input type="text" name="mang_kq" size= "70" disabled="disabled" value="<?php echo $str_kq;?> "/></td>

    </tr>

    

        <td>Kết quả tìm kiếm:</td>

        <td><input type="text" name="kq" size= "70" disabled="disabled"  value="<?php echo $ketqua;?> "/></td>

    </tr>

    <tr >

        <td colspan="2" align="center"><label>(Các phần tử trong mảng sẽ cách nhau bằng dấu ",")</label></td>

      
        

    </tr>

    <!-- <td align="right"><a style="color: red;" href="/BaocaoPHP/admin_page.php">Trở về</a></td> -->
    <td><a href="/admin_page.php"><input type="button" value="Trở về"></a></td>

</table>

</form>
</center>
<?php include('../../includes/footer.html') ?>
</body>

</html>

