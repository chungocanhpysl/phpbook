<?php

include_once "./db/connect.php";

if (isset($_POST['dangky']))
{
    $username =$_POST['username'];
    $password = md5($_POST['password']);
    $address = $_POST['address'];
    $SDT = $_POST['SDT'];
    $email = $_POST['email'];

// Kiểm tra username hoặc email có bị trùng hay không
    $sql = "SELECT * FROM tbl_khachhang WHERE username = '$username' OR email = '$email'";

// Thực thi câu truy vấn
    $result = mysqli_query($conn, $sql);

// Nếu kết quả trả về lớn hơn 1 thì nghĩa là username hoặc email đã tồn tại trong CSDL
    if (mysqli_num_rows($result) > 0)
    {

// Sử dụng javascript để thông báo
        echo '<script language="javascript">alert("Bị trùng tên hoặc chưa nhập tên!"); window.location="?page=register";</script>';

// Dừng chương trình
        die ();
    }
    else {
        $sql = "INSERT INTO tbl_khachhang (username, password, address, SDT,  email) VALUES ('$username','$password','$address','$SDT','$email')";

        if (mysqli_query($conn, $sql)){
           echo "Tên đăng nhập: ".$_POST['username']."<br/>";
            echo "Mật khẩu: " .$_POST['password']."<br/>";
            echo "Địa chỉ: " .$_POST['address']."<br/>";
            echo "Số điện thoại: ".$_POST['SDT']."<br/>";
            echo "Email đăng nhập: ".$_POST['email']."<br/>";


            echo "<a href='./?page=login'>Đến trang đăng nhập</a>";


        }
        else {
            echo '<script language="javascript">alert("Có lỗi trong quá trình xử lý"); window.location="?page=register";</script>';
        }
    }
}
?>