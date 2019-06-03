<!DOCTYPE html>
<?
	session_start();
	if($_SESSION['login']!='1') 
		header("Location:login.php");
?>
<html>
	<head>
		<meta charset=utf-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>	
		<title>學生會演唱會兌票系統</title>
	</head>
	
	<body >
	<center>
	<?php
	header("Content-Type:text/html; charset='utf-8'");
	include('db_connect.php');
	$database = 'stu1103108111';
	$db_select = mysql_select_db($database) or die("選擇資料庫失敗");
	
	if($db_select){
		echo "資料庫選擇成功。";
	}

	/*$sql_str="select * from 'student'";
	$res = mysql_query($sql_str) or die("語法錯誤");
	while($row array = mysql fetch row($res)){
		foreach($row_array as $key => $item){
			echo $key."=".$item."<br>";
		} 
	}*/
    ?>
		<div style="text-align: center;">
			<h1>國立高雄應用科技大學<br>演唱會兌票系統</h1>
			<img src="logo.png" width="200" height="200"><br>
				本次瀏覽此網站的IP為：<?php echo $_SERVER['REMOTE_ADDR'] ?>
		</div>
		<hr> 
			<table  width="250px"  border="1" cellspacing="0" >
				<tr>
						<td>學號</td>
						<td><input type='text'  name='data' required='required' id = 'number' ></td>
				</tr>	
					
			</table>
		
			<script>
				var res;
				$(document).ready(function(){
					$("#search").click(function(){
						send();
					});
					$("#number").keypress(function(e){
						//console.log("enter");
						if(e.keyCode == 13){
							send();
						}
					});
				});
				function send(){
					$.ajax({
						url: 'fin.php',
						data:'inputdata='+$('#number').val(),//+'&&ps='+
						type:"POST",
						dataType:'text',
						success: function(data){
							res = JSON.parse(data);
							if(res.judgement == 2){
								alert(res.studynumber+" "+res.name+"已領過票");
								//console.log(res.judgement);
							}else{
								if(res.judgement){
									//console.log(res);
									var check = confirm(res.studynumber+" "+res.name+" 已繳費，請確認是否領票?");
									if(check  == true){
									
										change_check($("#number").val());
										alert(res.studynumber+" "+res.name+" 已領票");
									}
								}else{
									alert($("#number").val()+"未繳費");
								}
							}			
							$('#number').val('');
							$('#number').focus();
						}
					});
				}
				function change_check(id){
					console.log(id);
					$.ajax({
						url: 'fin.php',
						data:{'inputdata':id,'check_1':1},//+'&&ps='+
						type:"POST",
						dataType:'text',
						success: function(data){
							/*res = JSON.parse(data);
							if(res.judgement == 2){
								alert($("#number").val()+"已領過票");
								//console.log(res.judgement);
							}*/
							console.log('check');
							console.log(data);
							
						}
					});
				}
			</script>
			<button id = "search">查詢</button>
			</center>
		
<a href="logout.php">登出</a></center>
	</body>

</html>
