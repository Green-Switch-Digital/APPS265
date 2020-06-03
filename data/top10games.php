<?php
require 'data/db_connection.php';
//select games according to their downloads
$query="SELECT * FROM games ORDER BY game_downloads DESC LIMIT 10";
//this gets and styles  the data properly
$results=$link->query($query);
while ($row=mysqli_fetch_array($results)) {
	echo "<a href=\"game.php?gameid=".$row["game_id"]."\" title=\"Download a ".$row["game_name"]." by ".$row["game_developer"]."\"><li>".
	"<img src=\"img/game_".$row["game_id"]."_icon.png\" class=\"game_icon\"/>"
	."<div class=\"game_data\"><h2 class=\"game_name\">".$row["game_name"]."</h2><br>".$row["game_developer"]."<br>".$row["game_downloads"]." downloads</div></li></a>";
}
$link->close()
?>