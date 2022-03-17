<?php
	
	$data=file_get_contents("php://input",'r');
	$dataArray=array();
	$dataArray=json_decode($data,true);

	if(isset($dataArray["ID"]) && isset($dataArray["Username"]) && isset($dataArray["Password"]) && isset($dataArray["Email"]) && isset($dataArray["Bday"]) && 
		isset($dataArray["Cellphone"]) && isset($dataArray["Edu"]) && isset($dataArray["Fstar"]) && isset($dataArray["Interest"])){
		if($dataArray["ID"]!="" && $dataArray["Username"] !="" && $dataArray["Password"] !="" && $dataArray["Email"] !="" && $dataArray["Bday"] !="" && 
			$dataArray["Cellphone"] !="" && $dataArray["Edu"] !="" && $dataArray["Fstar"] !="" && $dataArray["Interest"] !=""){

			$u_ID = $dataArray["ID"];
			$u_Username = $dataArray["Username"];
			$u_Password = $dataArray["Password"];						
			$u_Email = $dataArray["Email"];
			$u_Bday = $dataArray["Bday"];
			$u_Cellphone = $dataArray["Cellphone"];
			$u_Edu = $dataArray["Edu"];
			$u_Fstar = $dataArray["Fstar"];
			$u_Interest = $dataArray["Interest"];
			$u_Level = $dataArray["Level"];

			require_once("dbtools.php");
			$link= create_connection();

			$sql = "UPDATE member SET Username='$u_Username',Password='$u_Password' ,Email='$u_Email',Bday='$u_Bday', Cellphone='$u_Cellphone' ,
					Edu='$u_Edu', Fstar='$u_Fstar', Interest='$u_Interest', Level='$u_Level' WHERE ID='$u_ID' ";

			if(excute_sql($link,"id18041278_dbtest",$sql)){
				echo '{"state":true,"message":"更新成功!"}';
			}else{
				echo '{"state":false,"message":"更新失敗!"}';
			}
		}else{
			echo '{"state": false, "message" : "不允許空白欄位!"}';
		}		
	}else{
		echo '{"state":false,"message":"欄位錯誤!"}';
		// echo '{"state": false, "message" : "欄位錯誤!"}';
	}


?>