<?php
class Comments
{
	var $table_name="comments_1";
	var $view="views/comments_view.html";
	var $limit=15;//number of comments per view
	var $databaseLink="../data/db_connection.php";
	function __construct()
	{
		# code...
	}

	function showComments(){
		require $this->databaseLink;
		$sql="SELECT * FROM ".$this->table_name;
		$this->check_exitence($link);
		$results=$link->query($sql);
		//prepare the view for accessing
		$viewer="";
		//read view with path to view
		$view=file_get_contents($this->view);
		while ($row=mysqli_fetch_array($results)) {
			//preparing the view for processing
			$processed_view="";
			$processed_view=str_replace(":name:", $row['sender'] , $view);
			$processed_view=str_replace(":comment:", $row['message'], $processed_view);
			$processed_view=str_replace(":time:", $row['time_sent'], $processed_view);
			$viewer.=$processed_view;
			//processed view shown
		}
		echo $viewer;
	}

	function check_exitence($link)
	{
		$check_table_existence="DESCRIBE ".$this->table_name;
		if(!$link->query($check_table_existence)){
			$creation="CREATE TABLE ".$this->table_name."(id int(5) AUTO_INCREMENT PRIMARY KEY,message TEXT,sender varchar(60),time_sent varchar(20))";
			$link->query($creation);
			
		}
	}

	function setView($v)
	{
		$this->view=$v;
	}

	function addComment($message,$username){
		#note, your table must have a collumn id for autoincremented on, This will be used for
		#sorting the messages
		$time_stamp=Date("d M Y - h:i A");
		$sql="INSERT INTO ".$this->table_name."(sender,message,time_sent) VALUES('$username','$message',".
		"'$time_stamp')";
		// echo $sql;
		// echo $sql;
		require $this->databaseLink;
		$this->check_exitence($link);
		$link->query($sql) or die("Could no request this query ".mysqli_error($link));
	}
}

?>