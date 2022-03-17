<?php 
	
	$data=file_get_contents("php://input",'r');
	$dataArray=array();
	$dataArray=json_decode($data,true);
	if(isset($dataArray["username"])){
		if($dataArray["username"] !=""){

			$ch_username = $dataArray["username"];

			require_once("dbtools.php");
			$link = create_connection();
			$sql = "SELECT * FROM member WHERE Username = '$ch_username' "; //記得變數化!!
			$result = excute_sql($link,"id18041278_dbtest",$sql);
			if(mysqli_num_rows($result) !== 1){
				echo '{"state":true,"message":"帳號可使用"}';
			}else{
				echo '{"state":false,"message":"帳號重複!不可使用"}';
			}
			mysqli_close($link);			
		}else{
			echo '{"state": false, "message" : "不允許空白欄位!"}';
		}
	}else{
			echo '{"state": false, "message" : "欄位錯誤!"}';
	}

	// require_once("dbtools.php");
	// $link = create_connection();
	// $sql = "SELECT * FROM member WHERE Username = '11223344' "; //記得變數化!!
	// $result = excute_sql($link,"dbtest",$sql);
	// if(mysqli_num_rows($result) !== 1){
	// 	echo '{"state":true,"message":"帳號可使用"}';
	// }else{
	// 	echo '{"state":false,"message":"帳號重複!不可使用"}';
	// }
?>

