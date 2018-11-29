<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    if (!isset($_COOKIE['user'])) {
        //echo "请登录";
        echo "<script>location.href='index.php'</script>";
    } else if ($_COOKIE['user'] == "xco2") {
        echo "<img src=\"qrcode.png\" id=\"erweima\">";
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>听说你要上传文件</title>
    <link rel="stylesheet" href="stylesheets/narisore.css">
    <script src="javascripts/jquery.js"></script>
    <script src="javascripts/showtype.js"></script>
    <script>
        function showFileInput() {
            var fileInput = document.getElementById("photo");
            fileInput.click();
        }
    </script>
</head>
<body>

<a href="logout.php">
    <div id="out">登出</div>
</a>

<div id="updiv">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value="1024000000000000000000000">
        <input id="photo" name="photo" type="file" style="display: none">
        <input id="choosefile" type="button" onclick="showFileInput()" value="选择文件">
        <div id="filename">未上传文件</div>
        <input id="submit" type="submit" value="提交(form)">
    </form>
</div>
<div id="showfile_back">
    <select name="filetype" id="filetype">
        <option value="jpg">jpg</option>
        <option value="png">png</option>
        <option value="pdf">pdf</option>
        <option value="apk">apk</option>
        <option value="rar">rar</option>
        <option value="psd">psd</option>
        <option value="docx">docx</option>
    </select>
    <div id="showfile">
        <?php
        $conn = mysqli_connect('localhost', 'root', '');
        if ($conn) {
            mysqli_select_db($conn, 'poi') or die('指定的数据库不存在');
            mysqli_query($conn, 'SET NAMES UTF8') or die('字符集错误');
            $allarticle = mysqli_query($conn, "SELECT * FROM filepath WHERE Ftype='jpg' OR Ftype='jpeg' ORDER  BY uptime DESC;") or die("SQL执行失败" . mysqli_error($conn));
            $rows = mysqli_fetch_row($allarticle); ?>
            <!--        JPG图片-->
            <div id="jpg" style="display: none;"><h3>jpg/jpeg</h3>
                <?php
                $amount = mysqli_query($conn, "SELECT COUNT(Fname) FROM filepath WHERE Ftype='jpg' OR Ftype='jpeg' ORDER  BY uptime DESC;") or die("SQL执行失败" . mysqli_error($conn));
                $mun = mysqli_fetch_row($amount);
                echo "<div class='amount'>----------------------<span id='jpg_amoun'>" . $mun[0] . "</span>(条)</div>";
                while ($rows != null) {
                    ?>
                    <div class="tupian">
                        <?php echo "<img src='./upload/" . $rows[0] . "' alt='" . $rows[0] . "'>"; ?>
                    </div>
                    <?php
                    $rows = mysqli_fetch_row($allarticle);
                }
                ?>
            </div>
            <!--        PNG图片----------------------------------------------------->
            <?php
            $allarticle = mysqli_query($conn, "SELECT * FROM filepath WHERE Ftype='png' ORDER  BY uptime DESC;") or die("SQL执行失败" . mysqli_error($conn));
            $rows = mysqli_fetch_row($allarticle);
            ?>
            <div id="png"><h3>png</h3>
                <?php
                $amount = mysqli_query($conn, "SELECT COUNT(Fname) FROM filepath WHERE Ftype='png' ORDER  BY uptime DESC") or die("SQL执行失败" . mysqli_error($conn));
                $mun = mysqli_fetch_row($amount);
                echo "<div class='amount'>----------------------<span id='png_amoun'>" . $mun[0] . "</span>(条)</div>";
                while ($rows != null) {
                    ?>
                    <div class="tupian">
                        <?php echo "<img src='./upload/" . $rows[0] . "' alt='" . $rows[0] . "'>"; ?>
                    </div>
                    <?php
                    $rows = mysqli_fetch_row($allarticle);
                }
                ?>
            </div>
            <!--    PDF文件----------------------------------------------------->
            <?php
            $allarticle = mysqli_query($conn, "SELECT * FROM filepath WHERE Ftype='pdf' ORDER  BY uptime DESC;") or die("SQL执行失败" . mysqli_error($conn));
            $rows = mysqli_fetch_row($allarticle);
            ?>
            <div id="pdf" style="display: none;"><h3>pdf</h3>
                <?php
                $amount = mysqli_query($conn, "SELECT COUNT(Fname) FROM filepath WHERE Ftype='pdf' ORDER  BY uptime DESC") or die("SQL执行失败" . mysqli_error($conn));
                $mun = mysqli_fetch_row($amount);
                echo "<div class='amount'>----------------------<span id='pdf_amoun'>" . $mun[0] . "</span>(条)</div>";
                while ($rows != null) {
                    ?>
                    <a class="lianjie" target="blank" href="./upload/<?php echo $rows[0] . "." . $rows[1]; ?>">
                        <div>
                            <?php echo $rows[0]; ?>
                        </div>
                    </a>
                    <?php
                    $rows = mysqli_fetch_row($allarticle);
                }
                ?>
            </div>
            <!--    apk文件----------------------------------------------------->
            <?php
            $allarticle = mysqli_query($conn, "SELECT * FROM filepath WHERE Ftype='apk' ORDER  BY uptime DESC;") or die("SQL执行失败" . mysqli_error($conn));
            $rows = mysqli_fetch_row($allarticle);
            ?>
            <div id="apk" style="display: none;"><h3>apk</h3>
                <?php
                $amount = mysqli_query($conn, "SELECT COUNT(Fname) FROM filepath WHERE Ftype='apk' ORDER  BY uptime DESC") or die("SQL执行失败" . mysqli_error($conn));
                $mun = mysqli_fetch_row($amount);
                echo "<div class='amount'>----------------------<span id='apk_amoun'>" . $mun[0] . "</span>(条)</div>";
                while ($rows != null) {
                    ?>
                    <a class="lianjie" target="blank" href="./upload/<?php echo $rows[0] . "." . $rows[1]; ?>">
                        <div>
                            <?php echo $rows[0]; ?>
                        </div>
                    </a>
                    <?php
                    $rows = mysqli_fetch_row($allarticle);
                }
                ?>
            </div>
            <!--     rar文件----------------------------------------------------->
            <?php
            $allarticle = mysqli_query($conn, "SELECT * FROM filepath WHERE Ftype='rar' ORDER  BY uptime DESC;") or die("SQL执行失败" . mysqli_error($conn));
            $rows = mysqli_fetch_row($allarticle);
            ?>
            <div id="rar" style="display: none;"><h3>rar</h3>
                <?php
                $amount = mysqli_query($conn, "SELECT COUNT(Fname) FROM filepath WHERE Ftype='rar' ORDER  BY uptime DESC") or die("SQL执行失败" . mysqli_error($conn));
                $mun = mysqli_fetch_row($amount);
                echo "<div class='amount'>----------------------<span id='rar_amoun'>" . $mun[0] . "</span>(条)</div>";
                while ($rows != null) {
                    ?>
                    <a class="lianjie" target="blank" href="./upload/<?php echo $rows[0] . "." . $rows[1]; ?>">
                        <div>
                            <?php echo $rows[0]; ?>
                        </div>
                    </a>
                    <?php
                    $rows = mysqli_fetch_row($allarticle);
                }
                ?>
            </div>
            <!--     psd文件----------------------------------------------------->
            <?php
            $allarticle = mysqli_query($conn, "SELECT * FROM filepath WHERE Ftype='psd' ORDER  BY uptime DESC;") or die("SQL执行失败" . mysqli_error($conn));
            $rows = mysqli_fetch_row($allarticle);
            ?>
            <div id="psd" style="display: none;"><h3>psd</h3>
                <?php
                $amount = mysqli_query($conn, "SELECT COUNT(Fname) FROM filepath WHERE Ftype='psd' ORDER  BY uptime DESC") or die("SQL执行失败" . mysqli_error($conn));
                $mun = mysqli_fetch_row($amount);
                echo "<div class='amount'>----------------------<span id='psd_amoun'>" . $mun[0] . "</span>(条)</div>";
                while ($rows != null) {
                    ?>
                    <a class="lianjie" target="blank" href="./upload/<?php echo $rows[0] . "." . $rows[1]; ?>">
                        <div>
                            <?php echo $rows[0]; ?>
                        </div>
                    </a>
                    <?php
                    $rows = mysqli_fetch_row($allarticle);
                }
                ?>
            </div>
            <!--    world文件----------------------------------------------------->
            <?php
            $allarticle = mysqli_query($conn, "SELECT * FROM filepath WHERE Ftype='docx' ORDER  BY uptime DESC;") or die("SQL执行失败" . mysqli_error($conn));
            $rows = mysqli_fetch_row($allarticle);
            ?>
            <div id="docx" style="display: none;"><h3>docx</h3>
                <?php
                $amount = mysqli_query($conn, "SELECT COUNT(Fname) FROM filepath WHERE Ftype='docx' ORDER  BY uptime DESC;") or die("SQL执行失败" . mysqli_error($conn));
                $mun = mysqli_fetch_row($amount);
                echo "<div class='amount'>----------------------<span id='docx_amoun'>" . $mun[0] . "</span>(条)</div>";
                while ($rows != null) {
                    ?>
                    <a class="lianjie" target="blank" href="./upload/<?php echo $rows[0] . "." . $rows[1]; ?>">
                        <div>
                            <?php echo $rows[0]; ?>
                        </div>
                    </a>
                    <?php
                    $rows = mysqli_fetch_row($allarticle);
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>
</body>
</html>