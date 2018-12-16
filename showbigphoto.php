<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    header("Content-Type: text/html;charset=utf-8");
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
<div id="imgdiv" role="presentation">
    <img src="<?php echo "upload/" . $_GET['name']; ?>" alt="">
</div>
<div id="ctrlpohot">
    <?php
    $conn = mysqli_connect('localhost', 'root', '');
    if ($conn) {
        mysqli_select_db($conn, 'poi') or die('指定的数据库不存在');
        mysqli_query($conn, 'SET NAMES UTF8') or die('字符集错误');
        $name = explode(".", $_GET['name']);
        if (isset($name[1]) && $name[1] == 'png') {
            $allarticle = mysqli_query($conn, "SELECT * FROM filepath WHERE Fname='{$name[0]}' AND Ftype='png' ORDER  BY uptime DESC;") or die("SQL执行失败" . mysqli_error($conn));
        } else {
            $allarticle = mysqli_query($conn, "SELECT * FROM filepath WHERE Fname='{$_GET['name']}'ORDER  BY uptime DESC;") or die("SQL执行失败" . mysqli_error($conn));
        }
        $rows = mysqli_fetch_row($allarticle);
        $pixiv=explode("_",$rows[0]);
        if($pixiv[0]=="illust"){
            echo "<a href='https://www.pixiv.net/member_illust.php?mode=medium&illust_id=".$pixiv[1]."' target='_blank'>".$rows[0]."(To->P站)</a>";
        }else{
            echo "<div>Name:  ".$rows[0]."</div>";
        }
        echo "<div>Type:  ".$rows[1]."</div>";
        echo "<div>".date('Y-m-d H:i:s',$rows[2])."</div>";
    }
    ?>
</div>
<?php
if ($_COOKIE['user'] == "xco2") {
    echo "<div id=\"delet\" ><a href='delete.php?name=".$rows[0]."&type=".$rows[1]."'>×</a></div>";
}
?>

<div id="morebig">
    <img src="<?php echo "upload/" . $_GET['name']; ?>" alt="">
</div>
</body>
</html>