<?php
/**
 * 
 */
class CommentsServer
{
	function displayComments()
	{
		$table_name="comments_".$_REQUEST["gameid"];
		
		require '../data/db_connection.php';
		$sql="SELECT * FROM ".$table_name."";
		@$result=$link->query($sql);
		while (@$row=mysqli_fetch_array($result)) {
			$comment=$row["comment_body"];
			$user=$row["comment_user"];
			$date=$row["comment_date"];

			echo "<div class=\"comment\" title=\"Tag [$user] comment\">".
			"<p >".$comment."</p>".
			"<i> <span style=\"color:orange;\">".$user."</span> | ".$date."</i></div>";
		}
	}

	function respondComment($user,$message)
	{
		$now=date("d M Y - D ");
		$table_name="comments_".$_REQUEST["gameid"];
		require '../data/db_connection.php';

		//inserting into database
		$sql="INSERT INTO ".$table_name."(comment_body,comment_user,comment_date) VALUES('$message','$user','$now')";
		$result=$link->query($sql);
		if (mysqli_affected_rows($link)>0) {
   			// echo "comment added successfuly";
		}
		else{
			// echo "No changes where mafe";
		}
	}
}

$c=new CommentsServer();
if(@$_REQUEST["post"]!=null){
	//if the request to respond the data is ready
	$user=@$_POST["username"];
	$comment=@$_POST["comment"];
	$c->respondComment($user,$comment);
}
?>