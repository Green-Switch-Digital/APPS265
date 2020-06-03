<?php
/**
 * 
 */
class Blogs
{
	function updateViews($blog)
	{
		require "data/db_connection.php";
		$sql="SELECT * FROM blogs WHERE title='".$blog."'";
		$result=$link->query($sql);
		$row=mysqli_fetch_array($result);
		$views=$row["page_views"]+1;

		$sql2="UPDATE blogs SET page_views=$views WHERE title='".$blog."'";
		$link->query($sql2);
	}
	
	function getViews($blog)
	{
		require "data/db_connection.php";
		$sql="SELECT * FROM blogs WHERE title='".$blog."'";
		@$result=$link->query($sql);
		@$row=mysqli_fetch_array($result);
		return @$row["page_views"];
	}

	function getLikes($blog)
	{
		require "data/db_connection.php";
		$sql="SELECT * FROM blogs WHERE title='".$blog."'";
		@$result=$link->query($sql);
		@$row=mysqli_fetch_array($result);
		return @$row["likes"];
	}

	function getCommentsCount($blog)
	{
		require "data/db_connection.php";
		$sql="SELECT * FROM blog_comments_".$blog."";
		@$result=$link->query($sql);
		@$rowN=mysqli_num_rows($result);
		return @$rowN;
	}


}

?>