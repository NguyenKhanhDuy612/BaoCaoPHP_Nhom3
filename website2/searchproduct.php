<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">

</head>

<body>

    <?php include('../website2/include/header.php'); ?>
    <?php
    include('./include/connect.php');
    if (isset($_POST['tim'])){
        $tensp = $_POST['tensp'];
        $sql = "SELECT TENSP,DONGIA,ANHSP,MASP FROM  SANPHAM where TENSP LIKE '%$tensp%'";
        $result = mysqli_query($abc, $sql);
    }
   
    ?>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#header-carousel" data-slide-to="1"></li>
                        <li data-target="#header-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner3.png" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                            </div>
                        </div>
                        <div class="carousel-item position-relative active" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner1.jpg" alt=""
                                style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            </div>
                        </div>
                        <div class="carousel-item position-relative" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="img/banner2.png" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/32.jpg" alt="">

                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="img/31.jpg" alt="">

                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Chất lượng sản phẩm</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Miễn phí giao chuyển</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14 ngày đổi trả</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Hỗ trợ 24/7</h5>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Sản
                phẩm</span></h2>
        <div class='row px-xl-5'>
            <?php
        if (mysqli_num_rows($result) <> 0) {
           
            while ($rows = mysqli_fetch_row($result)) {
                $dc = $rows[1]+130000;
                $rows[1] = number_format($rows[1], 0, ',', '.') . " VNĐ";
                $dc1 = number_format($dc, 0, ',', '.') . " VNĐ";
                echo
                " 
        <div class='col-lg-3 col-md-4 col-sm-6 pb-1'>
            <div class='product-item bg-light mb-4'>
                <div class='product-img position-relative overflow-hidden'>
                    <img class='img-fluid w-100' src='img/$rows[2]' alt=''>
                    <div class='product-action'>
                        <a class='btn btn-outline-dark btn-square' href=''><i class='fa fa-shopping-cart'></i></a>
                        <a class='btn btn-outline-dark btn-square' href=''><i class='far fa-heart'></i></a>
                        <a class='btn btn-outline-dark btn-square' href=''><i class='fa fa-sync-alt'></i></a>
                        <a class='btn btn-outline-dark btn-square' href=''><i class='fa fa-search'></i></a>
                    </div>
                </div>
                <div class='text-center py-4'>
                    <a class='h6 text-decoration-none text-truncate' href='detailproduct.php?id=$rows[3]'>$rows[0]</a>
                    <div class='d-flex align-items-center justify-content-center mt-2'>
                        <h5>$rows[1]</h5><h6 class='text-muted ml-2'><del>$dc1</del></h6>
                    </div>
                    <div class='d-flex align-items-center justify-content-center mb-1'>
                        <small class='fa fa-star text-primary mr-1'></small>
                        <small class='fa fa-star text-primary mr-1'></small>
                        <small class='fa fa-star text-primary mr-1'></small>
                        <small class='fa fa-star text-primary mr-1'></small>
                        <small class='fa fa-star text-primary mr-1'></small>
                        <small>(99)</small>
                    </div>
                </div>
            </div>
            </div>";
            
            }
        }
        ?>
        </div>
    </div>

    </div>
    <?php include('../website2/include/footer.html'); ?>
</body>

</html>