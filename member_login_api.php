<?php
	
	$data = file_get_contents("php://input", "r");
	$dataArray = array();
	$dataArray = json_decode($data, true);

	if(isset($dataArray["username"]) && isset($dataArray["password"])){
		if($dataArray["username"] != "" && $dataArray["password"] != ""){

			$lgi_username = $dataArray["username"];
			$lgi_password = $dataArray["password"];

			require_once("dbtools.php");
			$link = create_connection();
			$sql = "SELECT * FROM member WHERE Username = '$lgi_username' AND Password = '$lgi_password' ";
		    $result = excute_sql($link, "id18041278_dbtest", $sql);
			if(mysqli_num_rows($result) ==1){

				//更新UUID欄位 substr(md5(uniqid(mt_rand())), 10, 15)
				$uuid = substr(md5(uniqid((mt_rand()))),2,25);
				$sql = "UPDATE member SET Uuid = '$uuid' WHERE Username = '$lgi_username'";
				if(excute_sql($link, "id18041278_dbtest", $sql)){

					echo '{"state": true, "uuid": "'.$uuid.'","message": "登入成功!"}';
					// echo '{"state": true, "message": "登入成功!"}';
				}else{
					echo '{"state": false, "message": "uuid產生失敗!"}';
				}

			}else{
				echo '{"state": false, "message": "帳號密碼登入失敗!"}';
			}
			mysqli_close($link);
		}else{
			echo '{"state": false, "message" : "不允許空白欄位!"}';
		}
	}else{
		echo '{"state": false, "message" : "欄位錯誤!"}';
	}

?>
