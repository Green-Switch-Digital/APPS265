<?php
	
class LatestGame
{
		//the id to top rated game
	private  $main_rated_game=0;
	private  $prevRating=0;
	private  $game_id=0;
	private $game_rating=0;
	private $game_name="";
	private $game_developer="";
	private $game_downloads="";

	function __construct()
	{
		//connect and get necessary data ready when the class loads
		require "data/db_connection.php";
		$query="SELECT * FROM games";
		//calculate the top rated game ever!
		$results=$link->query($query);
		while ($row=mysqli_fetch_array($results)) {
			//get and calculate all data
			$rating=$row["game_rating"];
			$total_rating=$row["game_total_rating"];
			
			$sum_rating=$total_rating*5;
			$percentage=($rating/$sum_rating) * 100;

			if($percentage>=$this->prevRating){
				$this->prevRating=$percentage;
				$this->game_id=$row["game_id"];
				$this->game_rating=$percentage;
				$this->game_name=$row["game_name"];
				$this->game_developer=$row["game_developer"];
				$this->game_downloads=$row["game_downloads"];
				// echo "<script>Toast(\"Game best changed to ".$row["game_name"]."\")</script>";
			}
		}
	}

	function getBGPicture()	{
		return "style=\"background:url(img/game_".$this->game_id."_main.jpg);\"";
	}

	function getRatings(){
		$stars=floor(($this->game_rating/100)*5);
		for($i=0;$i<=4;$i++){
					if($i<$stars){
					echo "<img src=\"img/star.png\" class=\"star\">";
				}else{
					echo "<img src=\"img/starempty.png\" class=\"star\">";
				}
				}
	}

	function getName()
	{
		return $this->game_name;
	}

	function getDownloads()
	{
		return "<span style=\"color:red;\">".$this->game_downloads."</span> downloads";
	}

	function getID()
	{
		return $this->game_id;
	}

	function getDeveloper()
	{
		return $this->game_developer;
	}

	function getCover()
	{
		return "src=\"img/game_".$this->game_id."_cover.png\"";
	}
}

class Games{

	function getCover($gid)
		{
			return "img/game_".$gid."_cover.png";		
		}	

		function getName($value)
		{
			require 'data/db_connection.php';
		$sql="SELECT * FROM games where game_id=$value";
		$result=$link->query($sql);		
		$row=mysqli_fetch_array($result);
		return $row["game_name"];
		}

		function getDeveloper($value)
		{
			require 'data/db_connection.php';
		$sql="SELECT * FROM games where game_id=$value";
		$result=$link->query($sql);		
		$row=mysqli_fetch_array($result);
		return $row["game_developer"];
		}

		function getCategory($value)
		{
			require 'data/db_connection.php';
		$sql="SELECT * FROM games where game_id=$value";
		$result=$link->query($sql);		
		$row=mysqli_fetch_array($result);
		return $row["game_category"];
		}

		function getRatings($value)
		{
			require '../data/db_connection.php';
		$sql="SELECT * FROM games where game_id=$value";
		$result=$link->query($sql);		
		$row=mysqli_fetch_array($result);
			$game_rating=$row["game_rating"];
			$total_rating=$row["game_total_rating"];
			
			$sum_rating=$total_rating*5;
			$percentage=($game_rating/$sum_rating) * 100;

			$stars=floor(($percentage/100)*5);
		for($i=0;$i<=4;$i++){
					if($i<$stars){
					echo "<img title=\"Rate this game with ".($i+1)." stars\"src=\"../img/star.png\" class=\"star\" onclick=\"rate_this_game($value,$i+1)\">";
				}else{
					echo "<img title=\"Rate this game with ".($i+1)." stars\"src=\"../img/starempty.png\" class=\"star\" onclick=\"rate_this_game($value,$i+1)\">";
				}
				}

		}



	function showAll($category)
	{
		$lim="";
		$option="";
		if ($category=="all-games"){
			$lim="";
			$option="WHERE game_app=0 ";
		}
		else if($category=="all-apps"){
			$lim="";
			$option="WHERE game_app=1 ";	
		}
		else{
			if($category=="apps"){
				$option="WHERE game_app=1 ";
			}else{
				$option="WHERE game_app=0";
			}
			$lim="LIMIT 5";

		}
		require 'data/db_connection.php';
		$sql="SELECT * FROM games ".$option." ORDER BY game_downloads DESC ".$lim;
		$result=$link->query($sql);
		while ($row=mysqli_fetch_array($result)) {
			//get all games from this category
			$game_id=$row["game_id"];
			$game_platform=$row["game_platform"];
			$game_developer=$row["game_developer"];
			$game_name=$row["game_name"];
			$category=$row["game_category"];
			$tr=$row["game_total_rating"];
			$r=$row["game_rating"];
			$js=$game_name.",".$game_platform.",".$game_id.",".$category.",".$tr.",".$r;
			$stars=getResolvedRatings($r,$tr);
			echo "<a href=\"game/?gameid=".$game_id."\">".
			"<div class=\"game-holder\">".
			"<img src=\"img/game_".$game_id."_cover.png\" alt=\" \" value=\"$game_name\" id=\"game_icon\"/>".
			"<span id=\"gn\" style=\"font-weight: bolder;font-size: large;margin-top: 20px;\">".$game_name."</span>".
			"<span id=\"gn\">".$game_developer."</span>"
			."<div class=\"ratings\">".$stars."</div>".
	 		"</div></a>";


			}
	}


	function showAllFilter($category,$name)
	{
		$lim="";
		$option="";
		// echo $category." for ".$name;
			if($category=="apps"){
				$option="WHERE game_app=1 ";
			}else if($category=="games"){
				$option="WHERE game_app=0";
			}else{
				$option="WHERE 1 ";
			}
			

		
		$option.=" AND game_name LIKE '%".$name."%'";
		require 'data/db_connection.php';
		$sql="SELECT * FROM games ".$option." ORDER BY game_downloads DESC ";
		$result=$link->query($sql);
		while ($row=mysqli_fetch_array($result)) {
			//get all games from this category
			$game_id=$row["game_id"];
			$game_platform=$row["game_platform"];
			$game_developer=$row["game_developer"];
			$game_name=$row["game_name"];
			$category=$row["game_category"];
			$tr=$row["game_total_rating"];
			$r=$row["game_rating"];
			$js=$game_name.",".$game_platform.",".$game_id.",".$category.",".$tr.",".$r;
			$stars=getResolvedRatings($r,$tr);
			echo "<a href=\"game/?gameid=".$game_id."\">".
			"<div class=\"game-holder\">".
			"<img src=\"img/game_".$game_id."_cover.png\" alt=\" \" value=\"$game_name\" id=\"game_icon\"/>".
			"<span id=\"gn\" style=\"font-weight: bolder;font-size: large;margin-top: 20px;\">".$game_name."</span>".
			"<span id=\"gn\">".$game_developer."</span>"
			."<div class=\"ratings\">".$stars."</div>".
	 		"</div></a>";


			}
	}

	
}

function getResolvedRatings($rate,$total_rate){
        //get and calculate all data
        $rating=$rate;
        $total_rating=$total_rate;
        $html="";
        $sum_rating=$total_rating*5;
        $percentage=($rating/$sum_rating) * 100;
        $s=floor( ($percentage/100)*5);
        for($i=0;$i<=4;$i++){
            $htt="";
            if($i<$s){
                $htt= "<img src=\"img/star.png\" class=\"star\">";
            }else{
                $htt= "<img src=\"img/starempty.png\" class=\"star\">";
            }
            if($html==""){
                $html=$htt;
            }else{
                $html.=$htt;
            }
        }
        return $html;

    }
?>