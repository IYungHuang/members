<?php
	
	$data=file_get_contents("php://input",'r');
	$dataArray=array();
	$dataArray=json_decode($data,true);

	if(isset($dataArray["ID"])){
		if($dataArray["ID"]!=""){

			$u_ID = $dataArray["ID"];
		

			require_once("dbtools.php");
			$link= create_connection();

			$sql = "DELETE FROM member WHERE ID='$u_ID' ";

			if(excute_sql($link,"id18041278_dbtest",$sql)){
				echo '{"state":true,"message":"刪除成功!"}';
			}else{
				echo '{"state":false,"message":"刪除失敗!"}';
			}
		}else{
			echo '{"state": false, "message" : "不允許空白欄位!"}';
		}		
	}else{
		echo '{"state":false,"message":"欄位錯誤!"}';
		// echo '{"state": false, "message" : "欄位錯誤!"}';
	}


?>