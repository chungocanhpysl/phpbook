<?php
include "db/connect.php";
$id = -1;
if (isset($_GET["id"])) {
    $id = intval($_GET['id']);
}
// Lấy ra nội dung bài viết theo điều kiện id
$sql = "select * from tbl_product where product_id = $id";

// Thực hiện truy vấn data thông qua hàm mysqli_query
$result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
?>
<div>
    <?php
    while ( $data = mysqli_fetch_array($result) ) {

    ?>
    <img src="<?php echo $data["product_image"]?>" alt="" width="30%">

    <h3><?php echo $data['product_name']; ?></h3>

    <p><?php echo $data['product_content']; ?></p>
</div>
<?php } ?>
