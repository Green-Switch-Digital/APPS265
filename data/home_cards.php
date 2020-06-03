<?php

$view=file_get_contents("views/home_card.php");
require 'data/db_connection.php';
$sql="SELECT * FROM games ORDER BY RAND() LIMIT 3";
$result=$link->query($sql);

while($row=mysqli_fetch_array($result)){
    $replace_view=str_replace(":image_link:", "game_".$row["game_id"]."_cover.png", $view);
    $replace_view=str_replace(":download_link:", $row["game_id"], $replace_view);
    $replace_view=str_replace(":image_alt:", $row["game_name"], $replace_view);
    echo $replace_view;
}
?>