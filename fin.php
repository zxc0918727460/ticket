<?php
	header("Content-Type:text/html; charset='utf-8'");
	include('db_connect.php');
	$database = 'stu1103108111';
	$db_select = mysql_select_db($database) or die("選擇資料庫失敗");
	
	$a = 1;	
	
	if($db_select){
		//echo "資料庫選擇成功。";
	}
	if(isset($_POST['check_1'])){
		$sql_check = "UPDATE`final2` SET `check` = '$a' where `id` = '".$_POST['inputdata']."' or `studynumber` = '".$_POST['inputdata']."';";
		mysql_query($sql_check) or die("語法錯誤");
		echo '1';
	}else{
		$sql_id = "select * from `final2` where `id` = '".$_POST['inputdata']."' or `studynumber` = '".$_POST['inputdata']."';";//設定收到的id
		$res =mysql_query($sql_id) or die("語法錯誤");//資料庫搜尋
		$res_array = mysql_fetch_assoc($res);//找到了
		
		
		

		if(mysql_num_rows($res) == 0 ){			//判斷到沒繳錢
			$res_array = array("judgement" => 0);
			$tamp = json_encode($res_array);	
			echo $tamp;
		}else{
			if($res_array['check'] == 1){
				$res_array["judgement"] = 2;	//判斷有拿過票
			}else{
				$res_array["judgement"] = 1;	//判斷到有繳錢
				//--拿完票後，要把資料庫裡面的check設為1。
				/*$sql_check = "UPDATE`TABLE 5` SET `check`='$a' WHERE `id` = '".$_POST['id']."';";
				mysql_query($sql_check) or die("語法錯誤");*/
			}
			$tamp = json_encode($res_array);
			echo $tamp;
		}
	}
?>