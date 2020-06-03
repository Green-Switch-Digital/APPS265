<?php
	require 'db_connection.php';
	$r=$_REQUEST["g"];
	$sql="SELECT * FROM games WHERE game_name LIKE '%".$r."%'";
	$result=$link->query($sql);
	$gms="";
	while ($row=mysqli_fetch_array($result)) {
		$gms.=$row["game_id"].",".$row["game_name"].",".$row["game_developer"].":";
	}
	echo $gms;
?>