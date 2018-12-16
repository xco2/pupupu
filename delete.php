<?php
header("Content-Type: text/html;charset=utf-8");
$file=iconv('utf-8', 'gbk', "./upload/".$_GET['name'].".".$_GET['type']);
if(!unlink($file)){
    echo "<script>alert('删除失败!')</script>";
}else{
    $conn = mysqli_connect('localhost', 'root', '');
    if ($conn) {
        mysqli_select_db($conn, 'poi') or die('指定的数据库不存在');
        mysqli_query($conn, 'SET NAMES UTF8') or die('字符集错误');
        $allarticle = mysqli_query($conn, "Delete FROM filepath WHERE Fname='{$_GET['name']}' AND Ftype='{$_GET['type']}'") or die ("SQL执行失败" . mysqli_error($conn));
    }
    echo"<script>alert('删除成功');location.href='narisore.php'</script>";
}