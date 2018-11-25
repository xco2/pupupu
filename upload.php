<?php
header("Content-Type: text/html;charset=utf-8");
if (isset($_FILES["photo"]["error"])) {
    if ($_FILES["photo"]["error"] > 0) {
        echo "Return Code: " . $_FILES["photo"]["error"] . "<br />";
        switch ($_FILES["photo"]["error"]) {
            case 1:
                echo "上传的文件超过了 php.ini 中 upload_max_filesize 选项限制的值。";
                break;
            case 2:
                echo "上传文件的大小超过了 HTML 表单中 MAX_FILE_SIZE 选项指定的值。";
                break;
            case 3:
                echo "文件只有部分被上传";
                break;
            case 4:
                echo "<script>alert('没有上传文件');location.href='narisore.php';</script>";
                break;
            case 6:
                echo "没有找不到临时文件夹";
                break;
            case 7:
                echo "文件写入失败。PHP 5.1.0 引进。";
        }
    } else {
        $fname = explode(".", $_FILES['photo']['name']);
//        echo "Upload: " . $fname[0] . "<br />";
//        echo "Type: " . $fname[1] . "<br />";
//        echo "Size: " . ($_FILES["photo"]["size"] / 1024) . " Kb<br />";
//        echo "Temp file: " . $_FILES["photo"]["tmp_name"] . "<br />";
        if (file_exists("upload/" . $_FILES["photo"]["name"])) {//判断文件是否重复
            echo "<script>alert('".$_FILES["photo"]["name"]."已经存在.');location.href='narisore.php';</script>";
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], "upload/" . iconv("UTF-8", "gbk", $_FILES["photo"]["name"]))) {//移动文件进行储存
                $conn = mysqli_connect('localhost', 'root', '');
                if ($conn) {
                    mysqli_select_db($conn, 'poi') or die('指定的数据库不存在');
                    mysqli_query($conn, 'SET NAMES UTF8') or die('字符集错误');
                    mysqli_query($conn, "INSERT INTO filepath (
		            Fname,
		            Ftype
	                ) values (
		            '{$fname[0]}',
		            '{$fname[1]}'
	                );"
                    ) or die("SQL执行失败" . mysqli_error($conn));
                }
                echo "<script>alert('成功上传:" . $_FILES['photo']['name'] . "');location.href='narisore.php';</script>";
            } else {
                echo $_FILES["photo"]["error"];
                echo "<script>alert('成功失败1: 不能上传改文件,请压缩后上传');location.href='narisore.php';</script>";
            }
        }
    }
} else {
    //echo $_FILES["photo"]["error"];
    echo "<script>alert('成功失败2: 不能上传改文件,请压缩后上传');location.href='narisore.php';</script>";
}
















//if(isset($_POST['photo'])){
//    echo $_POST['photo'];
//}else{
//    echo"没有";
//}
//$conn = mysqli_connect('localhost', 'root', '');
//if ($conn) {
//    mysqli_select_db($conn, 'poi') or die('指定的数据库不存在');
//    mysqli_query($conn, 'SET NAMES UTF8') or die('字符集错误');
//    $allarticle = mysqli_query($conn, "SELECT * FROM article");
//    $rows = mysqli_fetch_row($allarticle);
//    for(;$rows[0]!="";$rows = mysqli_fetch_row($allarticle)){
//        echo $rows[0];
//        echo $rows[1];
//        echo $rows[2];
//    }
//}

