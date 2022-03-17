<?php 
	
	$data=file_get_contents("php://input",'r');
	$dataArray=array();
	$dataArray=json_decode($data,true);
	if(isset($dataArray["uuid"])){
		if($dataArray["uuid"] !=""){

			$ch_uuid = $dataArray["uuid"];

			require_once("dbtools.php");
			$link = create_connection();
			$sql = "SELECT * FROM member WHERE Uuid = '$ch_uuid' "; //記得變數化!!
			$result = excute_sql($link,"id18041278_dbtest",$sql);
			if(mysqli_num_rows($result) == 1){
				$u_dataArray=array();
				while ($row=mysqli_fetch_assoc($result)) {
					$u_dataArray[] = $row;
				}
				echo '{"state":true,"data":'.json_encode($u_dataArray).', "message":"帳號已登入!"}';
			}else{
				echo '{"state":false,"message":"帳號尚未登入!"}';
			}
			mysqli_close($link);			
		}else{
			echo '{"state": false, "message" : "不允許空白欄位!"}';
		}
	}else{
			echo '{"state": false, "message" : "欄位錯誤!"}';
	}

?>

