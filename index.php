<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>bilibili干杯</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link href='stylesheets/indexpc.css' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<?php
		$conn = mysqli_connect('localhost', 'root', '');
		if ($conn) {
			mysqli_select_db($conn, 'poi') or die('指定的数据库不存在');
			mysqli_query($conn, 'SET NAMES UTF8') or die('字符集错误');
			//mysqli_query($conn, "INSERT INTO xlist (id,user, passwork) values ('3','xco4','2333')" ) or die("SQL执行失败".mysqli_error($conn));
			$result = mysqli_query($conn, "SELECT * FROM xlist");
			$rows = mysqli_fetch_row($result);
			if (isset($_GET['action']) && $_GET['action'] == 'create') {
				$_data = array();
				$_data['user'] = $_POST['user'];
				$_data['pass'] = $_POST['pass'];
				$isin = 0;
				for (; $rows[1] != ""; $rows = mysqli_fetch_row($result)) {
					if ($_data['user'] == $rows[1] && $_data['pass'] == $rows[2]) {
						$isin = 1;
						setcookie('user', $_data['user']);
					}
				}
				if ($isin == 1) {
					echo "<script>location.href='narisore.php';</script>";
				} else {
					echo "<script>alert('账号或密码错误');location.href='index.php';</script>";
				}
			}
			mysqli_close($conn);
		}
		?>
		<div id="middle">
			<div style="display: block;text-align: center;">
				请登陆
			</div>
			<form action="?action=create" method="post" style="position: relative;left:20px;top:15px;">
				账号：
				<input name="user" type="text" style="width: 140px;">
				</br>
				</br>
				密码：
				<input name="pass" type="password" style="width: 140px;">
				</br>
				<a href="zhuce.php">
					注册
				</a>
				<input id="in" type="submit" value="登陆">
			</form>
	</div>
        <script type="text/javascript">
            var hh = document.documentElement.clientHeight;
            document.getElementsByTagName("body")[0].style.height = hh + "px";
        </script>
	</body>
</html>
