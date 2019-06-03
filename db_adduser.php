<?
	session_start();
	header("Content-Type:text/html; charset='utf-8'");
	
	include('mysql_conn.php');
	//所要選擇的「資料庫名稱」變數
	$database = 'stu1103108111'; //請填入 「stu您的學號」
	
	$db_select = mysql_select_db($database) or die("資料庫選擇失敗");	
	$account = $_POST['account'];
	$passwd = md5($_POST['passwd']);
	$sql_str = "INSERT INTO `test`(`ac_id`, `account`, `passwd`) VALUES (null,'$account','$passwd')";
	$res = mysql_query($sql_str) or die("SQL語法錯誤");
	
	if($res) {
		header("Location:index.php"); 
	} 
?>
