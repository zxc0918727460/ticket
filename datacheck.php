<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<title>學生會演唱會兌票系統</title>
	</head>
	<?php
	header("Content-Type:text/html; charset='utf-8'");
	include('db_connect.php');
	$database = 'stu1103108111';
	$db_select = mysql_select_db($database) or die("選擇資料庫失敗");
	
	if($db_select)
		echo "資料庫選擇成功。";
    ?>
	<body>
		<div style="text-align: center;">
			<h1>國立高雄應用科技大學<br>演唱會兌票系統</h1><br><br>
				本次瀏覽此網站的IP為：<?php echo $_SERVER['REMOTE_ADDR'] ?>
		</div>
		<hr>
		<center>
			<?php
				if($_POST['data'] == "N125927380"){
					echo "<h1>已繳費</h1>";
					 echo "<script>setTimeout(function(){alert('已繳費  按下確定後繼續');history.go(-1);},1000);</script>";
				}else{
					echo "<h1>未繳費</h1>";
					 echo "<script>setTimeout(function(){alert('未繳費  按下確定後繼續');history.go(-1);},1000);</script>";
				}
			?>
			</center>
		</form>

	</body>

</html>