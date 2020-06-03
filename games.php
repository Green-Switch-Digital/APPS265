<!DOCTYPE html>
<html>
<head>
	<title>APPS265 GAMES</title>
	<script type="text/javascript" src="js/gslib_client.js"></script>
    <script type="text/javascript" src="js/jquery-2.x-git.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<link rel="icon" href="img/classic.png">
	<meta charset="utf-8" name="description" content="games malawi, games made in Malawi, malawi games">
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	<?php require 'data/Games.php'; 
	$games=new Games();
	?>
</head>
<body>
		<div class="top-">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php" style="color: white;">APPS265</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="color: white;"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php" style="color: white;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="games.php" style="color: white;border-bottom: 2px solid white;">Games</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="applications.php" style="color: white;">Apps</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="news.php" style="color: white;">News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="community.php" style="color: white;">Community</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="s">
      <input type="hidden" name="genre" value="all">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
	</div>
	<div class="menu">
		<a href="index.php" id="link"><img src="img/home.jpg"/><span>Home</span></a>
		<a href="games.php" id="link" class="active"><img src="img/game.png"/><span style="color: white;">Games</span></a>
		<a href="applications.php" id="link"><img src="img/apps.png"/><span>Applications</span></a>
		<a href="news.php" id="link"><img src="img/news.png"/><span>Gaming News</span></a>
	</div>

	<div class="content" style="margin-top: 10px;">
		<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" <?php if(@$_REQUEST["genre"]=="all" || @$_REQUEST["genre"]==""){echo "style=\"background: rgba(0,0,0,0.9);border: 0px;color: white;\"";} ?> href="?genre=all">All <span class="badge badge-dark"> 20</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" <?php if(@$_REQUEST["genre"]=="action"){echo "style=\"background: rgba(0,0,0,0.9);border: 0px;color: white;\"";} ?> href="?genre=action">Action <span class="badge badge-dark">10</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?genre=racing" <?php if(@$_REQUEST["genre"]=="racing"){echo "style=\"background: rgba(0,0,0,0.9);border: 0px;color: white;\"";} ?>>Racing <span class="badge badge-dark">2</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?genre=horror" <?php if(@$_REQUEST["genre"]=="horror"){echo "style=\"background: rgba(0,0,0,0.9);border: 0px;color: white;\"";} ?> href="?genre=*">Horror <span class="badge badge-dark">1</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="?genre=platformer" <?php if(@$_REQUEST["genre"]=="platformer"){echo "style=\"background: rgba(0,0,0,0.9);border: 0px;color: white;\"";} ?> href="?genre=*">Platformer <span class="badge badge-dark">13</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#!"></a>
  </li>
</ul>

		<h3 id="desc">showing <?php echo @$_REQUEST["genre"]; ?> games <span class="badge badge-dark">10</span></h3>
		<?php $games->showAll("all-games") ?>
		<div style="width: 100%;float: left;">
			<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#!" aria-label="Previous">
        <span aria-hidden="true">«</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <li class="page-item"><a class="page-link" href="#!">1</a></li>
    <li class="page-item">
      <a class="page-link" href="#!" aria-label="Next">
        <span aria-hidden="true">»</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
</nav>

		</div>
	</div>
<div style="width: 100%;float: left;">
 <?php 
 require 'views/footer.php';
 ?>
</div>
</body>
</html>