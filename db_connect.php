<?
	header("Content=Type:Text/html; charset=utf-8");
	$db_host = "203.64.91.58";
	$db_account = "";
	$db_password = "";
	$conn = @mysql_connect($db_host , $db_account,$db_password) or die("連線錯誤");
	
	mysql_query("SET NAMES 'utf-8'");
	mysql_query("SET CHARACTER SET 'utf8'");
?>
