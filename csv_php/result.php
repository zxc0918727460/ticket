<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta charset="big5">
		<title>print_csv</title>
		<link rel = "stylesheet" href = "question.css" type = "text/css">
	</head>
	<body>
		<table border="1" width="70%">
			<?php
				/**********檔案上傳***********/
				$uploadOk = 1;
				$tmpName = $_FILES["fileUpload"]["tmp_name"];//暫定的目錄路徑
				$fileName =$_FILES["fileUpload"]["name"];//目標路徑
				$file = basename($_FILES["fileUpload"]["name"]);

				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
				}else{		// if everything is ok, try to upload file//
					if (move_uploaded_file($tmpName,$fileName)){
						echo "The file ". basename( $_FILES["fileUpload"]["name"]). " has been uploaded.";
					}else{
						echo "Sorry, there was an error uploading your file.";
					}
				}


			 	/******讀取CSV並開啟********/
				$myfile = fopen($fileName,"r");
				$s = 1;
				while(!feof($myfile)){
					echo "<tr>";
					$get_data = fgetcsv($myfile,1000);
					foreach($get_data as $data){
						echo "<td>";
						echo $data;
						echo "</td>";
					}
					echo "</tr>";
				}
			?>
		</table>
		<button type="button" onclick="location.href='index.php'">回修改頁面</button>
	</body>
</html>
