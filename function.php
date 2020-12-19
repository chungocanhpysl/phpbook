<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/9/2020
 * Time: 4:50 PM
 */
function UploadFile (){
    // Kiểm tra phương thức gửi form đi có phải là POST hay ko ?
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Kiểm tra quá trình upload file có bị lỗi gì không ?
if(isset($_FILES["product_image"]) && $_FILES["product_image"]["error"] == 0){
    // Mảng chưa định dạng file cho phép
$allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
    // Lấy thông tin file bao gồm tên file, loại file, kích cỡ file
$filename = $_FILES["product_image"]["name"];
$filetype = $_FILES["product_image"]["type"];
$filesize = $_FILES["product_image"]["size"];

    // Kiểm tra định dạng file .jpg, png,...
$ext = pathinfo($filename, PATHINFO_EXTENSION);
    // Nếu không đúng định dạng file thì báo lỗi
if(!array_key_exists($ext, $allowed)) die("Lỗi : Vui lòng chọn đúng định dang file.");

    // Cho phép kích thước tối đa của file là 5MB
$maxsize = 5 * 1024 * 1024;
    // Nếu kích thước lớn hơn 5MB thì báo lỗi
if($filesize > $maxsize) die("Lỗi : Kích thước file lớn hơn giới hạn cho phép");

    // Kiểm tra file ok hết chưa
if(in_array($filetype, $allowed)){
    // Kiểm tra xem file đã tồn tại chưa, nếu rồi thì báo lỗi, không thì tiến hành upload
if(file_exists("upload/" . $_FILES["product_image"]["name"])){
echo $_FILES["product_image"]["name"] . " đã tồn tại";
} else{
    // Hàm move_uploaded_file sẽ tiến hành upload file lên thư mục upload
    move_uploaded_file($_FILES["product_image"]["tmp_name"], "upload/" . $_FILES["product_image"]["name"]);
    // Thông báo thành công
    echo "Upload file thành công";
}
} else{
    echo "Lỗi : Có vấn đề xảy ra khi upload file";
}
} else{
    echo "Lỗi: " . $_FILES["product_image"]["error"];
}
}
}