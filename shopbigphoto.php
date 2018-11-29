<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    if (!isset($_COOKIE['user'])) {
        //echo "请登录";
        echo "<script>location.href='index.php'</script>";
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>查看</title>
    <script src="javascripts/jquery.js"></script>
    <script src="javascripts/showbigphoto.js"></script>
    <link rel="stylesheet" href="stylesheets/showbigphoto.css">
</head>
<body>
<div id="imgdiv">
    <img src="<?php echo "upload/" . $_GET['name']; ?>" alt="">
</div>
</body>
</html>