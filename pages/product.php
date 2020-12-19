<?php
include "./db/connect.php";

?>
<?php
// Lấy 16 bài viết mới nhất đã được phép public ra ngoài từ bảng posts
$sql = "select * from tbl_product";
// Thực hiện truy vấn data thông qua hàm mysqli_query
$query = mysqli_query($conn,$sql) or die( mysqli_error($conn));
?>
<div class="row sp">

    <?php
    while ( $data = mysqli_fetch_array($query) ) {
        ?>


            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="sp_item">
                    <div class="sp__item__pic">
                        <img src="<?php echo $data["product_image"]?>" alt="" width="100%">

                        <ul class="sp__item__pic__hover">
                            <li><a href="?page=display&id=<?php echo $data["product_id"]; // Tạo liên kết đến trang display.php và truyền vào id bài viết ?>"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="?page=cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="sp__item__text">
                        <h4><a href="#"><?php echo $data["product_name"]?></a></h4>
                        <h6><a href="#"><?php echo $data["product_content"]?></a></h6>
                        <h5><?php echo number_format($data["product_price"])?></h5>
                    </div>
                </div>
            </div>









    <?php } ?>
