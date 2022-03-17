<?php
	require_once("dbtools.php");
	$link = create_connection();
	$sql = "SELECT * FROM member";
	$result = excute_sql($link, "id18041278_dbtest", $sql);

	if(mysqli_num_rows($result)>0){
		$dataArray = array();
		while($row = mysqli_fetch_assoc($result)){
			$dataArray[] = $row;
		}
		echo '{"state": true, "data": '.json_encode($dataArray).'}';
	}else{
		echo '{"state": false , "message": "無資料!"]}';
	}

	mysqli_close($link);
?>

