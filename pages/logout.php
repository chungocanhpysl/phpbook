<?php
if(!isset($_SESSION))
{
    session_start();
}
if($_SESSION['current_user'])
{
    session_destroy();
    echo "bạn đã đăng xuất tài khoản  thành công";
    echo "<br>";
    echo "quay lại trang đăng nhập? <a href='?page=login'>Đăng nhập</a>";

}

?>