<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chi tiết sản phẩm</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   
    <?php include('../website2/include/header.php');?>

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Trang chủ</a>
                    <a class="breadcrumb-item text-dark" href="#">Cửa hàng</a>
                    <span class="breadcrumb-item active">Chi tiết sản phẩm</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <?php 
        // $conn = mysqli_connect ('localhost','root','','qlsg') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
       
        // $select = "SELECT sanpham.TENSP, sanpham.KICHTHUOC, sanpham.DONGIA, sanpham.SLTON, sanpham.CHITIETSP, loaisp.TENLSP, sanpham.ANHSP, nhacc.TENNCC FROM sanpham,loaisp,nhacc WHERE sanpham.MASP='$MASP' and sanpham.MALSP = loaisp.MALSP and sanpham.MANCC = nhacc.MANCC";
        // $result = mysqli_query($conn, $select);

        if(isset($_GET["id"])&& !empty($_GET["id"])){
            $MASP = $_GET['id'];

            include('../exercise/xu_ly_san_pham/connect.php');
            $sql = "SELECT sanpham.TENSP, sanpham.KICHTHUOC, sanpham.DONGIA, sanpham.SLTON, sanpham.CHITIETSP, loaisp.TENLSP, sanpham.ANHSP, nhacc.TENNCC FROM sanpham,loaisp,nhacc WHERE sanpham.MASP='$MASP' and sanpham.MALSP = loaisp.MALSP and sanpham.MANCC = nhacc.MANCC";
    
            $result = mysqli_query($abc, $sql);

         
    
            if(mysqli_num_rows($result) <> 0){
                while($rows=mysqli_fetch_row($result)){
                    $tenSP = $rows[0];
                    $hinhSP = $rows[6];
                    $giaSP = number_format($rows[2],0,',','.')." VND";
                    $chiTietSP = $rows[4];
                    $tenLSP = $rows[5];
                    $tenNCC = $rows[7];
                    $soLuongTon = $rows[3];
                }
            }
        }
      
    ?>

    <form action="" method="POST">
        <!-- Shop Detail Start -->
        <div class="container-fluid pb-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 mb-30">
                    <div class="carousel-inner bg-light">
                        <img class='w-100 h-100' src='<?php echo "img/$hinhSP"; ?>' alt='Image'>
                    </div>
                </div>

                <div class="col-lg-7 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <h3><?php echo $tenSP; ?></h3>
                        <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div>
                        <h3 class="font-weight-semi-bold mb-4"><?php echo $giaSP; ?></h3>
                        <p class="mb-4"><?php echo $chiTietSP; ?></p>
                        <div class="d-flex mb-3">
                            <strong class="text-dark mr-3">Kích cỡ:</strong>
                            <form>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-1" name="size">
                                    <label class="custom-control-label" for="size-1">XS</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-2" name="size">
                                    <label class="custom-control-label" for="size-2">S</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-3" name="size">
                                    <label class="custom-control-label" for="size-3">M</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-4" name="size">
                                    <label class="custom-control-label" for="size-4">L</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="size-5" name="size">
                                    <label class="custom-control-label" for="size-5">XL</label>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex mb-4">
                            <strong class="text-dark mr-3">Màu:</strong>
                            <form>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-1" name="color">
                                    <label class="custom-control-label" for="color-1">Black</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-2" name="color">
                                    <label class="custom-control-label" for="color-2">White</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-3" name="color">
                                    <label class="custom-control-label" for="color-3">Red</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-4" name="color">
                                    <label class="custom-control-label" for="color-4">Blue</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="color-5" name="color">
                                    <label class="custom-control-label" for="color-5">Green</label>
                                </div>
                            </form>
                        </div>
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <div class="input-group quantity mr-3" style="width: 130px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Thêm vào giỏ hàng </button>
                        </div>
                        <div class="d-flex pt-2">
                            <strong class="text-dark mr-2">Chia sẻ:</strong>
                            <div class="d-inline-flex">
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a class="text-dark px-2" href="">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="bg-light p-30">
                        <div class="nav nav-tabs mb-4">
                            <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Thông tin</a>
                            <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Đánh giá (1)</a>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <h4 class="mb-3">Thông tin sản phẩm</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0">
                                                Loại sản phẩm:
                                            </li>
                                            <li class="list-group-item px-0">
                                                Tên nhà cung cấp: 
                                            </li>
                                            <li class="list-group-item px-0">
                                                Số lượng tồn: 
                                            </li>
                                          </ul> 
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0">
                                                <?php echo $tenLSP;?>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <?php echo $tenNCC;?>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <?php echo $soLuongTon;?>
                                            </li>
                                          </ul> 
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-pane-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="mb-4">1 Đánh giá cho "<?php echo $tenSP; ?>"</h4>
                                        <div class="media mb-4">
                                            <img src="img/hi5.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                                <h6>Hiền Tiên<small> - <i>01 Jan 2022</i></small></h6>
                                                <div class="text-primary mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <p>Tui không quan tâm giày! Tui chỉ quan tâm chủ shop thôi!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="mb-4">Đánh giá sản phẩm</h4>
                                        <small>Email của bạn sẽ không được công khai. Các trường bắt buộc được đánh dấu *</small>
                                        <div class="d-flex my-3">
                                            <p class="mb-0 mr-2">Đánh giá của bạn * :</p>
                                            <div class="text-primary">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="form-group">
                                                <label for="message">Trải nghiệm sản phẩm *</label>
                                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Tên của bạn *</label>
                                                <input type="text" class="form-control" id="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email của bạn *</label>
                                                <input type="email" class="form-control" id="email">
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" value="Gửi đánh giá" class="btn btn-primary px-3">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="" method="POST">
        <div class="container-fluid py-5">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Có thể bạn sẽ thích</span></h2>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel related-carousel">
                        
                        <?php 
                            include('../exercise/xu_ly_san_pham/connect.php');
                            // $conn = mysqli_connect ('localhost','root','','qlsg') OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );
                            $sumarySelect = "SELECT TENSP, DONGIA, MASP, ANHSP FROM sanpham";
                            $sumaryResult = mysqli_query($abc, $sumarySelect);

                            if(mysqli_num_rows($sumaryResult) <> 0){
                                while($rows=mysqli_fetch_row($sumaryResult)){
                                    $rows[1] = number_format($rows[1], 0, ',', '.') . " VNĐ";
                                    echo "
                                        <div class='product-item bg-light'>
                                            <div class='product-img position-relative overflow-hidden'>
                                                <img class='img-fluid w-100' src='img/$rows[3]' alt=''>
                                                <div class='product-action'>
                                                    <a class='btn btn-outline-dark btn-square' href=''><i class='fa fa-shopping-cart'></i></a>
                                                    <a class='btn btn-outline-dark btn-square' href=''><i class='far fa-heart'></i></a>
                                                    <a class='btn btn-outline-dark btn-square' href=''><i class='fa fa-sync-alt'></i></a>
                                                    <a class='btn btn-outline-dark btn-square' href=''><i class='fa fa-search'></i></a>
                                                </div>
                                            </div>
                                                <div class='text-center py-4'>
                                                    <a class='h6 text-decoration-none text-truncate' href='detail.php?id=$rows[2]'>$rows[0]</a>
                                                    <div class='d-flex align-items-center justify-content-center mt-2'>
                                                        <h5>$rows[1]</h5><h6 class='text-muted ml-2'></h6>
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
                                    ";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <!-- Footer Start -->
    <?php include('../website2/include/footer.html');?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>