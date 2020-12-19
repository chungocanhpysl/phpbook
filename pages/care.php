<div class="row">
    <div class="col-lg-8">
        <div class="hero__search">
            <div class="hero__search__form"  style="float: right">
                <form action="#">

                    <input type="text" placeholder="Bạn muốn tìm gì ?">
                    <button type="submit" class="site-btn">TÌM KIẾM</button>
                </form>
            </div>

        </div>
    </div>


</div>


<section class="title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Sự chăm sóc hoàn hảo cho bạn chó</h2>
            </div>
        </div>
    </div>
</section>
<!-- Checkout Section Begin -->
<?php

$item_per_page = !empty($_GET["sanpham"]) ? $_GET["sanpham"]:4;
$current_page = !empty($_GET["trang"]) ? $_GET["trang"]:1;
$offset = ($current_page - 1) * $item_per_page;
$product1 = mysqli_query($conn,"select * from tbl_product1 order by product1_id asc limit ".$item_per_page." offset ".$offset);

$totalRecords = mysqli_query($conn,"select * from tbl_product1");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords/$item_per_page);
?>
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
            while($row_product1 = mysqli_fetch_array($product1)) {

            ?>

            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="sp_item">
                    <div class="sp__item__pic">
                        <img src="<?php echo $row_product1["product1_image"]?>" alt="" width="100%">

                        <ul class="sp__item__pic__hover">
                            <li><a href="?page=chitiet?id=<?php echo $product1_id?>"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="sp__item__text">
                        <h4><a href="#"><?php echo $row_product1["product1_name"]?></a></h4>
                        <h6><a href="#"><?php echo $row_product1["product1_content"]?></a></h6>
                        <h5><?php echo number_format($row_product1["product1_price"])?></h5>
                    </div>
                </div>
            </div>



            <?php } ?>

            <div class="paginate">

                <?php
                if($current_page > 3) {
                    $first_page = 1;

                ?>
                <a href='./?page=care&sanpham=<?=$item_per_page?>&trang=<?=$first_page?>'>First</a>
                <?php }
                if ($current_page > 1) {
                    $prev_page = $current_page -1;
                    ?>
                <a href='./?page=care&sanpham=<?=$item_per_page?>&trang=<?=$prev_page?>'>Prev</a>
                <?php
                }
                ?>

                <?php for ($num =1; $num <= $totalPages; $num++) { ?>
                    <?php if ($num != $current_page) { ?>
                        <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                        <a href='./?page=care&sanpham=<?=$item_per_page?>&trang=<?=$num?>'><?=$num?></a>
                            <?php } ?>

                        <?php } else { ?>
                        <strong><?=$num?></strong>
                        <?php } ?>
                <?php } ?>

                <?php
                if ($current_page < $totalPages - 1) {
                    $next_page = $current_page + 1; ?>
                    <a href='./?page=care&sanpham=<?=$item_per_page?>&trang=<?=$next_page?>'>Next</a>

                    <?php
                    }


                if($current_page < $totalPages - 3) {
                    $end_page = $totalPages;

                    ?>
                    <a href='./?page=care&sanpham=<?=$item_per_page?>&trang=<?=$end_page?>'>Last</a>
                <?php }

                ?>
        </div>


        </div>


    </div>
</section>