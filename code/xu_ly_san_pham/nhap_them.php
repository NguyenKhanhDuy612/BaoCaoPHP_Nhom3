
<?php
function lay_msp()
{
    require_once("connect.php");
    $sql = "SELECT max(MASP) FROM sanpham";

    $result = mysqli_query($abc, $sql);

    if (mysqli_num_rows($result) <> 0) {

        while ($rows = mysqli_fetch_row($result)) {
            $masp_max = $rows['0'];
        }
    }
    $tmp = substr($masp_max, 3, 5);
    $masp_new = (int)$tmp + 1;
    return $masp_new;
}
echo "\n SP000" . lay_msp();

?>