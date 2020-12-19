<?php
session_start();

?>

<?php
include_once "db/connect.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include_once "partials/head.php";?>
</head>

<body>
<!--header-->

<?php include_once "partials/header.php";?>

<!--end header-->

<?php
if(isset($_GET["page"]) && $_GET["page"]) {
    $filepath = dirname(__FILE__)."/pages/".trim($_GET["page"].".php");
   // echo "<br> file path: " .$filepath;
    if(file_exists($filepath)) {
        include_once "pages/".trim($_GET["page"]) . ".php";
    }
}
else {
    include_once "pages/home.php";
}?>




<?php include_once "partials/footer.php";?>

</body>

</html>