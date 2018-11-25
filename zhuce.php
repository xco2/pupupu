<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>注册</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
		<link href='stylesheets/indexpc.css' rel='stylesheet' type='text/css'>
		<script type="text/javascript">

		</script>
	</head>
	<body>
		<?php
		$conn = mysqli_connect('localhost', 'root', '');
		if ($conn) {
			mysqli_select_db($conn, 'poi') or die('指定的数据库不存在');
			mysqli_query($conn, 'SET NAMES UTF8') or die('字符集错误');
			$result = mysqli_query($conn, "SELECT * FROM xlist");
			$rows = mysqli_fetch_row($result); 
			if (isset($_GET['action']) && $_GET['action'] == 'zhuce') {
				$_data = array();
				$_data['user'] = $_POST['user'];
				$_data['pass'] = $_POST['pass'];
				$isin=0;
				for(;$rows[1]!="";$rows = mysqli_fetch_row($result)){
					if ($_data['user'] == $rows[1]) {
						$isin=1;	
					}
				}
				if($isin==1){
					echo "<script>alert('账号已存在');location.href='zhuce.php';</script>";
				}else{
					mysqli_query($conn, "INSERT INTO xlist (user, passwork) values ('{$_data['user']}','{$_data['pass']}')" ) or die("SQL执行失败".mysqli_error($conn));
					echo "<script>alert('注册成功');location.href='index.php';</script>";
				}
			}
		}
		
		?>
		<div id="middle" style="background-color: rgba(92, 219, 232, 0.6);">
			<div style="display: block;text-align: center;">
				请注册
			</div>
			<form action="?action=zhuce" method="post" style="position: relative;left:20px;top:15px;"">
				账号：
				<input name="user" type="text" style="width: 140px;">
				</br>
				</br>
				密码：
				<input name="pass" type="password" style="width: 140px;">
				</br>
				<a href="index.php" style="position: relative;left:0px;top:10px;text-decoration: none;color:greenyellow;">返回登陆</a>
				<input type="submit" value="注册" style="position: relative;left:78px;top:10px;height: 25px;border-radius:25px;">
			</form>
		</div>

        <script type="text/javascript">
            var hh = document.documentElement.clientHeight;
            document.getElementsByTagName("body")[0].style.height = hh + "px";
        </script>
	</body>
</html>
