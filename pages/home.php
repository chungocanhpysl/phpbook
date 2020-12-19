<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<?php
$sql_category_con = mysqli_query($conn, "select * from tbl_category_con order by category_con_id asc");
$sql_category = mysqli_query($conn, "select * from tbl_category order by category_id asc");
$product = mysqli_query($conn,"select * from tbl_product order by product_id asc");
?>
<!-- giữa -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">

                <div class="hieuung">

                    <div class="danhsach">
                        <i class="fa fa-bars"></i>
                        <a href="./?page=product"><span>Danh mục sản phẩm</span></a>
                    </div>

                    <div class="motkhoi">
                        <li><a href="#">
                        <?php
                        while ($row_category = mysqli_fetch_array($sql_category)) {
                            ?>
                            <h3><?php echo $row_category["category_name"]?></h3>
                            <?php
                        }
                        ?>
                            </a>
                        </li>

                    </div>

                </div>
            </div>

            <?php


            $output = "";
            if(isset($_POST['btnSearch'])) {
                $search = $_POST['txtSearch'];
                if($search != "") {
                    $query = mysqli_query($conn, "select * from tbl_product where product_name LIKE '%$search%'") or die("not search");
                    $result = mysqli_num_rows($query);
                    if ($result == 0) {
                        //kết quả tìm kiếm = 0
                        $output .= "không tìm thấy kết quả ' $search': $result";
                    }
                    else {
                        $output .= "tất cả sản phẩm được tìm  '$search': $result'";
                        while ($row = mysqli_fetch_array($query)) {
                            // khai báo biến và gán giá trị
                            $product_id = $row['product_id'];
                            $product_image = $row['product_image'];
                            $product_name = $row['product_name'];
                            $product_content = $row['product_content'];
                            $product_price = $row['product_price'];

                            $output .= "<div> $product_id <br> $product_image <br> $product_name <br>$product_content <br> $product_price </div> ";
                        }

                    }
                } else {
                    //không có ký tự nào được nhập
                    $output .= "vui lòng nhập sản phẩm cần tìm";
                }
            }




            ?>
            <div class="col-lg-8">
                <div class="hero__search">
                    <div class="hero__search__form">
                       <form action="index.php" method="post">

                           <input type="text" name="txtSearch" placeholder="Bạn muốn tìm gì ? Search?">
                           <button type="submit" name="btnSearch" class="site-btn">TÌM KIẾM</button>
                      </form>

                        <?php echo $output; ?>
                    </div>

                </div>


                <div class="hero-item">
                    <div class="hero-anh">
                        <img class="mySlides" src="assets/img/anhto.jpg" style="width:100%">
                        <img class="mySlides" src="assets/img/slide1.jpg" style="width:100%">
                        <img class="mySlides" src="assets/img/slide2.jpg" style="width:100%">

                        <button class="prev" onclick="plusDivs(-1)">&#10094;</button>
                        <button class="next" onclick="plusDivs(1)">&#10095;</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- end giữa -->


<section class="sanphamnoibat">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>

            </div>
        </div>
        <div class="row sp">

            <?php
            while($row_product = mysqli_fetch_array($product)) {

                ?>

                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="sp_item">
                        <div class="sp__item__pic">
                            <img src="<?php echo $row_product["product_image"]?>" alt="" width="100%">

                            <ul class="sp__item__pic__hover">
                                <li><a href="./?page=test&id=<?php echo $product_id;?>"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="?page=cart"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="sp__item__text">
                            <h4><a href="#"><?php echo $row_product["product_name"]?></a></h4>
                            <h6><a href="#"><?php echo $row_product["product_content"]?></a></h6>
                            <h5><?php echo number_format($row_product["product_price"])?></h5>
                        </div>
                    </div>
                </div>



            <?php } ?>





        </div>
    </div>
</section>

<section class="blog">

    <h1 style="text-align: center;color:red;margin-top: 50px;">Ơ kìa!!! Xin đừng lướt qua như thế khi chưa vote cho chúng mình 5* nhaaaa</h1>
    <div class="stars" style="margin-left: 40%">

        <form action="">
            <input class="star star-5" id="star-5" type="radio" name="star"/>
            <label class="star star-5" for="star-5"></label>
            <input class="star star-4" id="star-4" type="radio" name="star"/>
            <label class="star star-4" for="star-4"></label>
            <input class="star star-3" id="star-3" type="radio" name="star"/>
            <label class="star star-3" for="star-3"></label>
            <input class="star star-2" id="star-2" type="radio" name="star"/>
            <label class="star star-2" for="star-2"></label>
            <input class="star star-1" id="star-1" type="radio" name="star"/>
            <label class="star star-1" for="star-1"></label>
        </form>
    </div><!--đóng div stars-->

    <!-- feedback khách hàng -->
    <div class="ffead-back">
        <h1 style="text-align:center;margin-top: 60px;">ĐÁNH GIÁ KHÁCH HÀNG</h1>

        <ul class="feedback">

            <li class="flex-itemfb">
                <div class="tong" style="background-color: #d6d8db;width: auto;height: 350px;">
                    <div id="anh"><img src="assets/img/pi.jpg" alt="ảnh"/>  </div>
                    <div id="chu">
                        <h3>Pi Đẹp Trai</h3>
                        <div class="star" data-score="5" data-number="5" title="gorgeous">
                            <i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <p>Nhìn mặt tôi có vẻ hơi buồn chứ nó không liên quan đến cái phần rì viu này đâu. Nơi đây bán nhiều đồ kute lắm nhé các bạn!!! Hihi</p>
                    </div>
                </div>
            </li>
            <li class="flex-itemfb">
                <div class="tong" style="background-color: #d6d8db;width: auto;height: 350px;">
                    <div id="anh"><img src="assets/img/pi2.jpg" alt="ảnh"/>  </div>
                    <div id="chu">
                        <h3>Tôi đã quay trở lại</h3>
                        <div class="star" data-score="5" data-number="5" title="gorgeous">
                            <i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <p>Nhìn đi...Tôi đã phải gâu gâu lên kêu con sen nhà tôi mua những món đồ tuyệt vời tại đây đấy!!!</p>
                    </div>
                </div>
            </li>
            <li class="flex-itemfb">
                <div class="tong" style="background-color: #ffeeba;width: auto;height: 350px;">
                    <div id="anh">

                        <img src="assets/img/pi1.jpg" alt="ảnh"/>

                        <div id="chu">
                            <h4>Vẫn lại là tôi</h4>
                            <div class="star" data-score="5" data-number="5" title="gorgeous">
                                <i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <p>Nhìn mặt tôi hớn hở hơn rồi đúng không nào? Nói chung tôi rất thích những món đồ ở đây. Chỉ 1 từ thôi: PƠ PHỆCH hí hí
                            </p>
                        </div>
                    </div>
                </div>
            </li>


            <li class="flex-itemfb">
                <div class="tong" style="background-color: #d6d8db;width: auto;height: 350px;">
                    <div id="anh"><img src="assets/img/pi2.jpg" alt="ảnh"/>  </div>
                    <div id="chu">
                        <h3>Tôi lại nghèo rồi</h3>
                        <div class="star" data-score="5" data-number="5" title="gorgeous">
                            <i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>&nbsp;<i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <p>Lợn của con Sen nhà tôi bị moi ra để mua đồ cho tôi hết rồi các đồng chí ạ!!!</p>
                    </div>
                </div>
            </li>

        </ul>
    </div>
    <!--đóng feedback-->
</section>