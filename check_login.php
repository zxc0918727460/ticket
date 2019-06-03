<?
	session_start();
	header("Content-Type:text/html; charset='utf-8'");
	
	include('mysql_conn.php');
	//所要選擇的「資料庫名稱」變數
	$database = 'stu1103108111';  //請填入 「stu您的學號」
	
	$db_select = mysql_select_db($database) or die("資料庫選擇失敗");	
	
	$account = str_replace("'","\'",$_POST['account']);
	$passwd = md5(str_replace("'","\'",$_POST['passwd']));
	
	
	$sql_str = "select * from `test` where `account` = '$account' and `passwd` = '$passwd'";
	$res = mysql_query($sql_str) or die("SQL語法錯誤");
	$row_array = mysql_fetch_assoc($res);
	
	
	if($row_array) {
		$_SESSION['login'] = '1';
		$_SESSION['account'] =  $row_array['account'];					
		header("Location:index.php"); 
	} else {
		$_SESSION['login'] = '2';
		header("Location:login.php"); 
	}		
?>
