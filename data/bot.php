<?php
$c=$_REQUEST["c"];
if($c=="get")
{
require 'db_connection.php';
$query="SELECT * FROM games ORDER BY game_id ASC LIMIT 10";
//this gets and styles  the data properly
$results=$link->query($query);
while ($row=mysqli_fetch_array($results)) {
	echo $row["game_id"].". ".$row["game_name"]."<br/><br/>";
}
}

else if ($c=="show"){
require 'db_connection.php';
$query="SELECT * FROM games WHERE game_id='".$_REQUEST["g"]."'";
//this gets and styles  the data properly
$results=$link->query($query);
$row=mysqli_fetch_array($results);

	echo 
	"<img src=\"http://localhost:8080/Web/gamesmalawi/img/game_".$row["game_id"]."_icon.png\" alt=\"".$row["game_id"]."\"/>".
	$row["game_name"]."<br>".
	$row["game_category"]."<br>".
	$row["game_developer"]
	;
	
}

?>