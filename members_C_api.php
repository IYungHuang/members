<?php
	
	$data = file_get_contents("php://input", "r");
	$dataArray = array();
	$dataArray = json_decode($data, true);

	if(isset($dataArray["username"]) && isset($dataArray["password"]) && isset($dataArray["email"]) && isset($dataArray["bday"]) && isset($dataArray["cellphone"]) && isset($dataArray["edu"]) && isset($dataArray["address"]) && isset($dataArray["gender"]) && isset($dataArray["fstar"]) && isset($dataArray["interest"])){
		if($dataArray["username"] != "" && $dataArray["password"] != "" && $dataArray["email"] != "" && $dataArray["bday"] != "" && $dataArray["cellphone"] != "" && $dataArray["edu"] != "" && $dataArray["address"] != "" && $dataArray["gender"] != "" && $dataArray["fstar"] != "" && $dataArray["interest"] != ""){

			$c_username = $dataArray["username"];
			$c_password = $dataArray["password"];
			$c_email = $dataArray["email"];
			$c_bday = $dataArray["bday"];
			$c_cellphone = $dataArray["cellphone"];
			$c_edu = $dataArray["edu"];
			$c_address = $dataArray["address"];
			$c_gender = $dataArray["gender"];
			$c_fstar = $dataArray["fstar"];
			$c_interest = $dataArray["interest"];

			require_once("dbtools.php");
			$link = create_connection();

			$sql =  "INSERT INTO member(Username,Password,Email,Bday,Cellphone,Edu,Address,Gender,Fstar,Interest,Uuid,Level) VALUES('$c_username','$c_password','$c_email','$c_bday','$c_cellphone','$c_edu','$c_address','$c_gender','$c_fstar','$c_interest','','2')";
			 
			if(excute_sql($link, "id18041278_dbtest", $sql)){
				echo '{"state": true, "message": "新增成功!"}';
			}else{
				echo '{"state": false "message": "新增失敗!"}';
			}
			mysqli_close($link);
		}else{
			echo '{"state": false, "message" : "不允許空白欄位!"}';
		}
	}else{
		echo '{"state": false, "message" : "欄位錯誤!"}';
	}

?>