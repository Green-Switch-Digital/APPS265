<!DOCTYPE html>
<html>
<head>
	<title>Appsmw</title>
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
        <a class="nav-link" href="games.php" style="color: white;">Games</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="applications.php" style="color: white;border-bottom: 2px solid white;">Apps</a>
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
	<div class="searching-panel">
		<h3 id="search_filter">Searching : </h3>
		<div class="games"></div>
	</div>
	<div class="menu">
		<a href="index.php" id="link"><img src="img/home.jpg"/><span>Home</span></a>
		<a href="games.php" id="link" ><img src="img/game.png"/><span >Games</span></a>
		<a href="applications.php" id="link" class="active"><img src="img/apps.png"/><span style="color: white;">Applications</span></a>
		<a href="news.php" id="link"><img src="img/news.png"/><span>Gaming News</span></a>
	</div>

	<div class="content" style="margin-top: 10px;">
		<h3 id="desc">All Applications</h3>
		<?php $games->showAll("all-apps") ?>
	</div>
<div style="width: 100%;float: left;">
	 <?php 
 require 'views/footer.php';
 ?>
</div>
</body>
</html>