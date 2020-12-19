

<?php
$sql_category = mysqli_query($conn, "select * from tbl_category order by category_id asc");
?>
<header class="header">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> bancung@gmail.com</li>
                            <li><i class="fa fa-phone"></i>0366.247.203 Hỗ trợ 24/7</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">


                        <div class="header__top__right__language">
                            <a href="./?page=login">Đăng nhập</a>
                            <a href="./?page=register">Đăng ký</a>

                        </div>

                        <div class="header__top__right__auth">
                            <a href="./?page=contact"><i class="fa fa-user"></i>Liên hệ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end header-top-->
    <div class="header_up">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="assets/img/logo.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./index.php">Trang chủ</a></li>
                            <li><a href="#"> Quản trị Trang</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./?page=cart">Giỏ hàng</a></li>
                                    <li><a href="./?page=thanhtoan">Thanh toán</a></li>

                                </ul>
                            </li>


                            <li><a href="">Chi tiết</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./?page=care">Chăm sóc chó</a></li>
                                    <li><a href="./?page=dodung">Đồ dùng</a></li>
                                    <li><a href="./?page=phukien">Phụ kiện</a></li>
                                    <li><a href="./?page=thucan">Thức ăn</a></li>
                                    <li><a href="./?page=thuoc">Thuốc thú y</a></li>
                                </ul>
                            </li>


                            <li><a href="./?page=contact">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-4">
                    <div class="header__cart">
                        <ul>
                            <?php
                            if (isset($_SESSION['current_user'])) {

                                echo "Xin chào " . $_SESSION["current_user"];
                                echo "<a href='./?page=logout'> Đăng xuất </a>";

                            }

                            ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>