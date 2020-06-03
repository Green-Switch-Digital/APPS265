<?php
$data=@$_REQUEST["data"];
$game_to_rate=json_decode($data);
require 'db_connection.php';
$sql="SELECT * FROM games WHERE game_id=".$game_to_rate->gameid;
$result=$link->query($sql);
	#select the data from this table
	$row=mysqli_fetch_array($result);
	$grate=$row["game_rating"];
	$gtrate=$row["game_total_rating"];
$update_rating=$gtrate+1;
$whole_rates=$grate+$game_to_rate->gamerating;
$sql2="UPDATE games SET game_rating=$whole_rates,game_total_rating=$update_rating WHERE game_id=$game_to_rate->gameid";
$link->query($sql2);
#the response to javascript page and data
echo "You have rated successfully!";
?> 