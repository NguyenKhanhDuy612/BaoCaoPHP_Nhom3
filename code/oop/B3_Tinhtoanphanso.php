<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính toán phân số</title>
</head>

<body>

    <?php
        include 'B3_Lopphanso.php';

        if (isset($_POST["ts1"])) $ts1 = $_POST["ts1"];else $ts1 = 0;
        if (isset($_POST["ms1"])) $ms1 = $_POST["ms1"];else $ms1 = 0;
        if (isset($_POST["ts2"])) $ts2 = $_POST["ts1"];else $ts2 = 0;
        if (isset($_POST["ms2"])) $ms2 = $_POST["ms2"];else $ms2 = 0;


        if (isset($_POST['tinh'])) {
            
            $ts1 = $_POST['ts1'];
            $ts2 = $_POST['ts2'];
            $ms1 = $_POST['ms1'];
            $ms2 = $_POST['ms2'];

        
            if($ms1 != 0 ){
                $ps1 = new Fraction($ts1,$ms1);
                if($ms2 != 0 ){
                    $ps2 = new Fraction($ts2,$ms2);
                } else{
                    echo "Mẫu số phân số 2 phải khác 0";
                    return 0;
                }
            }
            else{
                echo "Mẫu số phân số 1 phải khác 0";
                return 0;
            }
              
             

            if (isset($_POST['pheptoan']) && ($_POST['pheptoan']) == "cộng") {
               $giatri = Fractions::add($ps1, $ps2); 
                $toigian =  Fractions::toString($giatri); // 2
                $ps  = Fractions::fromString($toigian);
                // $ketqua = "Phép cộng : ".$ps->toString();
            }
            if (isset($_POST['pheptoan']) && ($_POST['pheptoan']) == "trừ") {
               $giatri = Fractions::subtract($ps1, $ps2); 
                $toigian =  Fractions::toString($giatri); // 2
                $ps  = Fractions::fromString($toigian);
            }
            if (isset($_POST['pheptoan']) && ($_POST['pheptoan']) == "nhân") {
               $giatri = Fractions::multiply($ps1, $ps2); 
                $toigian =  Fractions::toString($giatri); // 2
                $ps  = Fractions::fromString($toigian);
            }
            if (isset($_POST['pheptoan']) && ($_POST['pheptoan']) == "chia") {
               $giatri = Fractions::divide($ps1, $ps2); 
                $toigian =  Fractions::toString($giatri); // 2
                $ps  = Fractions::fromString($toigian);
            }
            
           $ketqua = "Phép ". $_POST['pheptoan'] .": ".$ps->toString();
          
        }
    ?>
<!-- ========================================================== -->
    <style>
        #main {
            margin: 0 auto;
            background-color: cornsilk;
        }

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
            /* width: 70px; */
        }
    </style>

    <form action="" method="post">

        <table id="main">
            <caption>
                <h3>TÍNH TOÁN 2 PHÂN SỐ</h3>
            </caption>
            <tr>
                <td>
                    <table border='0'>
                        <tr>
                            <td>Phân số 1:</td>
                            <td>Tử số: </td>
                            <td><input type="text" name="ts1" value="<?php if (isset($_POST['ts1'])) echo $_POST['ts1']; ?>" /></td>
                            <td>Mẫu số: </td>
                            <td><input type="text" name="ms1" value="<?php if (isset($_POST['ms1'])) echo $_POST['ms1']; ?>" /></td>
                        </tr>
                        <tr>
                            <td>Phân số 2:</td>
                            <td>Tử số: </td>
                            <td><input type="text" name="ts2" value="<?php if (isset($_POST['ts2'])) echo $_POST['ts2']; ?>" /></td>
                            <td>Mẫu số: </td>
                            <td><input type="text" name="ms2" value="<?php if (isset($_POST['ms2'])) echo $_POST['ms2']; ?>" /></td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <fieldset style="width:250px">
                        <legend> Chọn phép toán</legend>
                        <input type="radio" name="pheptoan" value="cộng" <?php if (isset($_POST['pheptoan']) && ($_POST['pheptoan']) == "cộng") echo 'checked="checked"' ?> />Cộng

                        <input type="radio" name="pheptoan" value="trừ" <?php if (isset($_POST['pheptoan']) && ($_POST['pheptoan']) == "trừ") echo 'checked="checked"' ?> />Trừ
                        <input type="radio" name="pheptoan" value="nhân" <?php if (isset($_POST['pheptoan']) && ($_POST['pheptoan']) == "nhân") echo 'checked="checked"' ?> />Nhân
                        <input type="radio" name="pheptoan" value="chia" <?php if (isset($_POST['pheptoan']) && ($_POST['pheptoan']) == "chia") echo 'checked="checked"' ?> />Chia
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td colspan="0"><input type="submit" name="tinh" value="Kết quả" /></td>
            </tr>
            <tr>
                <td><input style="border:none" name="ketqua"  value="<?php if (isset($_POST['ketqua'])) echo $ketqua; ?>" > </input></td>
            </tr>

        </table>



    </form>
</body>

</html>