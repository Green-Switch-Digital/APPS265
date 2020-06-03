<?php
//get meta data for a game here
/**
 * 
 */
class GameMeta
{
	var $game_name,$game_developer,$game_platform,$game_date,$game_downloads,$game_url,$game_category;	
	function __construct($struct)
	{
		
		$game_id=@$_GET["gameid"];
//validate this page's entry point
if(!isset($game_id)){
	header('location:../');
}
//get all the necessary information here
require $struct.'data/db_connection.php';

$sql="SELECT * FROM games WHERE game_id='".$game_id."'";
$result=$link->query($sql);
$row=mysqli_fetch_array($result);
$this->game_name=$row["game_name"];
$this->game_developer=$row["game_developer"];
$this->game_downloads=$row["game_downloads"];
$this->game_platform=$row["game_platform"];
$this->game_url=$row["game_url"];
$this->game_date=$row["game_date"];
$this->game_id=$row["game_id"];
$this->game_details=$row["game_details"];

$this->game_category=$row["game_category"];
$this->game_platform=$row["game_platform"];

//all the game meta data is ready
	}

}
?>