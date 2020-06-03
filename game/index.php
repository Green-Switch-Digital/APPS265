<!DOCTYPE html>
<html>
<head>
	
	<script type="text/javascript" src="../js/gslib_client.js"></script>
	<script type="text/javascript" src="../js/jquery-2.x-git.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/index.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/mobile.css">
	<link rel="icon" href="img/classic.png">
	
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	
	<meta charset="utf-8" name="description" content="games malawi, games made in Malawi, malawi games">
	<!-- <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1"> -->
	<?php 
	@session_start();
	require '../data/Games.php'; 
	require '../data/gamemeta.php'; 
	require '../data/gsComments.php';
	$game_meta=new GameMeta("../");
	$games=new Games();
	$comments=new Comments();
	$comments->databaseLink="../data/db_connection.php";


	?>
	<title><?php echo $game_meta->game_name;?> : APPS265 GAMES</title>
	<meta charset="utf-8" name="description" content="<?php echo $game_meta->game-details; ?>">
</head>
<div class="image-preview">
	<button class="btn btn-danger" id="btn-close" onclick="scale('.image-preview',0)">&times;</button>
	<img src="" id="prv_image">
</div>
<body style="background: rgba(250,250,250,0.8);">
		<div class="top-">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php" style="color: white;">APPS265</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="color: white;"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../index.php" style="color: white;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../games.php" style="color: white;">Games</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../applications.php" style="color: white;">Apps</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../news.php" style="color: white;">News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../community.php" style="color: white;">Community</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="../search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="s">
      <input type="hidden" name="genre" value="all">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
	</div>

	<div id="content2">
		<nav aria-label="breadcrumb" id="beradc">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
    <li class="breadcrumb-item"><a href="../games.php">Games | Apps</a></li>
    <li class="breadcrumb-item"><?php echo $game_meta->game_name;?></li>
  </ol>
</nav>
		<div class="game-display">
			<!-- <img src="../img/game_3_main.jpg" id="game_main"> -->
			<div class="game-cover">
			<?php echo "<img src=\"../img/game_".$game_meta->game_id."_main.jpg\" id=\"game_main\" onclick=\"show_preview('../img/game_".$game_meta->game_id."_main.jpg')\" title=\"Click for full screen preview\"/>"; ?>
				<!-- <span id="previouse" title="Previous"><</span>
				<span id="next" title="Next">></span> -->
			</div>
			<div class="ratings-game">
				<?php
					//create stars and ratings here that are javascriptable and clickable for rating
					$games->getRatings(@$_REQUEST["gameid"]);
				 ?>
			</div>
			<a <?php echo "href=\"../download.php?gameid=".$game_meta->game_id."\""; ?>><button id="install" >Download</button></a>
			<div class="game-details">
				<h2 style="margin-bottom: 0px;padding-bottom: 0px;float: left;width: 95%;margin-left: 5%;"><?php echo $game_meta->game_name?></h2>
				<p style="margin-left: 5%;margin-top: 5px;float: left;width: 95%;"><?php echo $game_meta->game_developer." | ".$game_meta->game_category;  ?></p>
				<p id="game-info" style="color: rgba(0,0,0,0.8);">
					<?php echo $game_meta->game_details ?>
				</p>
				<p id="game-info" style="color: rgba(0,0,0,0.8);">File size : <?php 
					$filelocation="../downloads/".$game_meta->game_url;
					if (file_exists($filelocation)){
					$filesize=filesize($filelocation);
					$mbs=floor($filesize/1000000)." mbs";
					if($mbs<=0){
						$mbs=floor($filesize/1000)." kbs";
					}
					echo $mbs;
					}
				?></p>
				<p id="game-info" style="color: rgba(0,0,0,0.8);">Uploaded on : <?php 
					$filelocation="../downloads/".$game_meta->game_url;
					if (file_exists($filelocation)){
					$mbs=date("F d Y H:i:s",filemtime($filelocation));
					echo $mbs;
					}
				?></p>
				<?php 
				$platform_data=$game_meta->game_platform;
				$platforms=explode(";", $platform_data);
				foreach ($platforms as $platform) {
					echo "<img src=\"../img/".$platform.".png\" title=\"$platform\" id=\"platform\"/>";
				}
				?>
				<hr id="hr">
				<div class="comments-section">
					<h3>Comments Section</h3>
					<?php 
						$comments->table_name="com_".@$_REQUEST["gameid"];
						$comments->setView("../views/comments_view.html");
						
					 ?>
					<div class="response" >
			<a name="response"></a>	
			<form action="" method="POST" style="width: 90%;float: left;margin-left: 5%;margin-top: 20px;border:1px solid #ccc;padding: 10px;border-radius: 10px;"> 
            <?php 
            if(!empty($_REQUEST["message"])){
                $name=@$_REQUEST["name"];
                if (isset($_SESSION["name"])){
                    $name=$_SESSION["name"];
                }
                $_SESSION["name"]=@$_REQUEST["name"];

                $comments->addComment($_REQUEST["message"],$name);
            }
                        $comments->showComments();

            ?>


            <div class="form-group">
        <?php
        if(isset($_SESSION["name"])){
            echo "<input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"enter name\" ".
            "value=\"".$_SESSION["name"]."\" disabled>";
        }else{
            echo "<label for=\"exampleFormControlInput1\">Name :</label>".
            "<input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"enter name\" >";
        }
        ?></div>
       <div class="form-group">
    <label for="exampleFormControlInput1">Message</label>
    <input type="text" class="form-control" name="message" placeholder="enter message">
  </div>
        <input type="submit" name="mes" class="btn btn-primary" value="reply">
                </form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="game_hover_icon">
		<div class="card">
  <img class="card-img-top" src="../img/game_1_icon.png" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">the Biscuit Factory 2</h4>
    <p class="card-text">
      Play this amazing and awsome game by the evil monkey game
      studios with ease on you laptop and android device. Compete 
      with the rest of the world in this run and jump and fight 
      franchise.
    </p>
    <a href="#!" class="btn btn-primary">Try it out!</a>
  </div>
</div>

	</div>
<div style="width: 100%;float: left;">
	<?php require '../views/footer.php'; ?>
</div>
</body>
</html>