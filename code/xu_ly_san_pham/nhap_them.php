<?php
require('connect.php');
// include('layout.php');
?>


<select style="margin:10px;" name="MALSP" id="">
    <?php $query = "select * from loaisp";    //Hiển thị tên các hãng sữa
    $result = mysqli_query($abc, $query); ?>
    <?php while ($rows2 = mysqli_fetch_array($result)) :; ?>

        <option value=""><?php echo $rows2[1]; ?></option>
        <!-- <option value=""><?php print_r($rows2); ?></option> -->
    <?php endwhile; ?>
</select>