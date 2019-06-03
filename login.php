<!DOCTPYE html>
<?
session_start();
switch($_SESSION['login']){
	case '1':
		header("Location:index.php"); 
	break;
	case '2':
		echo "<script>alert('帳號或密碼錯誤');</script>";
		unset($_SESSION['login']);
	break;
}
 
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>學生資料管理系統</title>
		<style>*{font-family:"微軟正黑體";}</style>
	</head>
	<body>
	<div style="text-align: center;">
			<h1>國立高雄應用科技大學<br>演唱會兌票系統</h1>
			<img src="logo.png" width="200" height="200"><br>
				本次瀏覽此網站的IP為：<?php echo $_SERVER['REMOTE_ADDR'] ?>
		</div>
		<hr> 
		<center>
		<form action="check_login.php" method="POST">
			帳號：<input type="text" name="account" required ><br>
			密碼：<input type="password" name="passwd" required ><br><br>
			<button type="submit" >登入</button>
		
		</form>
		</center>
	</body>
</html>