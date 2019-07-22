<?
	header("Content-Type:text/html; charset=utf-8");
	//資料庫主機設定
	$db_host = "203.64.91.58";	
	$db_account = "";		
	$db_password = "";
	//連線伺服器
	$conn = mysql_connect($db_host, $db_account, $db_password) or die("資料庫連線錯誤");
	//設定字元集與連線校對
	mysql_query("SET CHARACTER SET 'utf8'");
	mysql_query("SET NAMES 'utf8'"); 
	
?>

