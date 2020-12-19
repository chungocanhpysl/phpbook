<?php
if(!isset($_SESSION))
{
    session_start();
}
?>
<?php

require './db/connect.php';

if (isset($_POST['dangnhap']))
{


    //Lấy dữ liệu nhập vào
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }



    //Kiểm tra tên đăng nhập có tồn tại không
    $query = mysqli_query($conn, "SELECT username, password FROM tbl_khachhang WHERE username='$username'");
    if (mysqli_num_rows($query) == 0) {
        echo "Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Lấy mật khẩu trong database ra
    $row = mysqli_fetch_array($query);

    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($password != $row['password']) {
        echo "Mật khẩu không đúng. Vui lòng nhập lại. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
    }

    //Lưu tên đăng nhập
    $_SESSION['current_user'] = $username;
    echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='./index.php'>Về trang chủ</a>";
    die();
}
?>

<section class="dangky">
    <div class="container">

        <div class="dangky__form">
            <h4>Đăng nhập thành viên</h4>
            <form action="?page=login" method="post">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <div class="dangky__input">
                            <p>Tên đăng nhập<span>*</span></p>
                            <input type="text" name="username" value="">
                        </div>

                        <div class="dangky__input">
                            <p>Mật khẩu<span>*</span></p>
                            <input type="password" name="password" value="">
                        </div>

                        <div class="dangky__input">
                            <button type="submit" name="dangnhap" class="btn btn-success">Đăng nhập</button>
                            <a href='?page=register' title='Đăng ký'>Đăng ký</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>