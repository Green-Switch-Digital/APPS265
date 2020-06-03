<?php
require '../data/db_connection.php';
$game_id=@$_REQUEST["gameid"];
$game_link="";
$query="SELECT game_downloads,game_url FROM games WHERE game_id=$game_id";
$data=$link->query($query);
while ($row=mysqli_fetch_array($data)) {
	$downloads=$row['game_downloads'];
	$game_link=$row["game_url"];
	}	
$add=$downloads+1;
$updateDB="UPDATE games SET game_downloads=$add WHERE game_id=$game_id";
$send=$link->query($updateDB);
if (mysqli_affected_rows($link)==1) {
	header("Location:../downloads/$game_link");
} else {
	echo "fail to download please try again";
}


?>