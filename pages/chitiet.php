
<?php
include "./db/connect.php"
?>
<section class="title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Chi tiết sản phẩm</h2>
            </div>
        </div>
    </div>
</section>
<!-- Checkout Section Begin -->



<?php

$product1_id = 1;
if (isset($_GET["product1_id"])) {
    $id = intval($_GET['product1_id']);
}
$sql = "select * from tbl_product1 where product1_id = $product1_id";
$tv="select * from tbl_product where product_id='$product_id'";
$tv_1=mysqli_query($conn, $tv);
$tv_2=mysqli_fetch_array($tv_1);

?>

<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="sp_item">
        <div class="sp__item__pic">
            <img src="<?php echo $tv_2['product_image']?>" alt="" width="100%">

            <ul class="sp__item__pic__hover">
                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                <li><a href="?page=care"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
        </div>
        <div class="sp__item__text">
            <h4><a href="#"><?php echo $tv_2["product_name"]?></a></h4>
            <h6><a href="#"><?php echo $tv_2["product_content"]?></a></h6>
            <h5><?php echo number_format($tv_2["product_price"])?></h5>
        </div>
    </div>
</div>