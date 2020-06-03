<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/fontawesome-free/css/fontawesome.min.css">
	<script type="text/javascript" src="js/gslib_client.js"></script>
	<script type="text/javascript" src="js/jquery-2.x-git.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	
	<link rel="icon" href="img/classic.png">
	
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	
	<meta charset="utf-8" name="description" content="games malawi, games made in Malawi, malawi games">
	<!-- <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1"> -->
	<title>Download Notice : APPS265 </title>
	<meta charset="utf-8" name="description" content="If you develop applications or games, get your product through this console designed for local developers.">
	<?php
require 'data/gamemeta.php';
$game_meta=new GameMeta("");
?>
	<script type="text/javascript">
		function _ready(argument) {
			var t=0
			var myinterval=setInterval(function(){
				t++
				setValue("timer",(t-7)*-1)
				if (t>6) {
					clearInterval(myinterval)
					
					setValue("download-notice","Thank you for downloading")
					setValue("timer","")

					window.location="data/download.php?gameid=<?php echo $game_meta->game_id?>"
					setImage("download-icon","img/download-complete.png")
				}

			},1000)
		}
	</script>
</head>

<body style="background: rgba(250,250,250,0.8);">
	<div class="fixed-bottom bg-dark" id="cookie_panel" style="padding: 20px;bottom: 0%;transition: 600ms ease-in-out;">
		<p style="color: white;margin: 0px;">This site Uses Cookies and Javascript make sure they are enabled <button class="btn btn-light" onclick="get('cookie_panel').style.bottom='-50%';Toast('Awsome!')">I Agree</button></p>

	</div>
		<div >
		<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="index.php" style="color: white;">APPS265</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="color: white;"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="game/" style="color: white;">Back <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
  </div>
</nav>
	</div>

	<div id="content" style="padding: 50px;">
		
		<h1 id="main-notice"><img src="img/download.png" id="download-icon" /> <span id="download-notice">Downloading File in</span> <span id="timer">7</span></h1>
		<h5>If your app doesn't start downloading within the a few seconds click <a href="downloads/<?php echo $game_meta->game_url ?>">here</a></h5>
		<ol id="ol-data">
			<li><img src="img/game_<?php echo$game_meta->game_id ?>_icon.png" id="download-icon"></li>
			<li>
				<h5 style="font-weight: bold;">Game Name : <?php echo $game_meta->game_name ?></h5>
			</li>
			<li>File size : <?php 
					$filelocation="downloads/".$game_meta->game_url;
					if (file_exists($filelocation)){
					$filesize=filesize($filelocation);
					$mbs=floor($filesize/1000000)." mbs";
					if($mbs<=0){
						$mbs=floor($filesize/1000)." kbs";
					}
					echo $mbs;
					}
				?></li>
				<li>
					Uploaded on : <?php 
					$filelocation="downloads/".$game_meta->game_url;
					if (file_exists($filelocation)){
					$mbs=date("F d Y H:i:s",filemtime($filelocation));
					echo $mbs;
					}
				?>
				</li>
				<li>
					Downloads : <?php echo $game_meta->game_downloads ?>
				</li>
		</ol>
		
	</div>

	<div class="game_hover_icon">
	

	</div>
<div style="width: 100%;float: left;">
<?php 
 require 'views/footer.php';
 ?>
</div>
</body>
</html>