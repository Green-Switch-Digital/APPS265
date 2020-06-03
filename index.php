<!DOCTYPE html>
<html>
<head>
  <script data-ad-client="ca-pub-2027118458102048" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<title>APPS265 Home of Malawian Games and Softwares</title>
	<script type="text/javascript" src="js/gslib_client.min.js"></script>
	<script type="text/javascript" src="js/jquery-2.x-git.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/index.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<link rel="icon" href="img/classic.png">
	<meta charset="utf-8" name="description" content="Home of softwares made in Malawi">
  <meta charset="utf-8">
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	<?php require 'data/Games.php'; 
	$games=new Games();
	?>
</head>
<body>
	<div class="top-">
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="width:100%;float: left;">
  <a class="navbar-brand" href="index.php" style="color: white;">APPS265</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="color: white;"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php" style="color: white;border-bottom: 2px solid white;">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="games.php" style="color: white;">Games</a>
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
	
    
    <div class="gs-slider">
     <!--  <div class="card" id="game-card-news">
  <img class="card-img" src="img/gamejam.png" alt="apps265 Game Jam 2020">
  <a href="gamejam/" title="Join Game Jam!"><button class="btn btn-primary disabled" id="btn-dowload-gamejam">Join Now</button></a>
  <div class="card-img-overlay">
    
  </div>
</div> -->
      <div class="card" id="game-card-news">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active"  style="width: 100%;float: left;padding: 0px;">
      <img class="d-block w-100" src="img/gamejam.png" style="width: 100%;float: left;"  alt="900x400" data-holder-rendered="true">
    </div>
    <div class="carousel-item" style="width: 100%;float: left;padding: 0px;">
      <img class="d-block w-100" src="img/gamejam2.png" data-src="" alt="900x400" data-holder-rendered="true">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        
      </div>
      <?php
      require 'data/home_cards.php';
       ?>
  </div>
	<div class="content">

		<h3 id="desc">Most Downloaded Games</h3>
		<?php $games->showAll("") ?>
		<h3 id="desc">Most Downloaded Application</h3>
		<?php $games->showAll("apps") ?>
    <h3 id="desc">Blogs : What you need to know</h3>
    <img src="blogs/imgs/MakeYourFirstGameFeaturedImageTop.jpg" style="width: 100%;float: left;height: 300px;
object-fit: cover;">
	</div>
<div style="width: 100%;float: left;">
	<?php 
  require 'views/footer_home.php';
   ?>
</div>
</body>
</html>


