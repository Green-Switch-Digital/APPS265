<!DOCTYPE html>
<html>
<head>
	<title>APPS265 COMMUNITY GROUPS AND CHATS</title>
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
	<?php 
  require 'data/Games.php'; 
  require 'data/Blogs.php'; 
	$games=new Games();
  $blogs=new Blogs();
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
        <a class="nav-link" href="applications.php" style="color: white;">Apps</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="news.php" style="color: white;">News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="community.php" style="color: white;border-bottom: 2px solid white;">Community</a>
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
		<a href="games.php" id="link" ><img src="img/game.png"/><span >Games</span></a>
		<a href="applications.php" id="link" ><img src="img/apps.png"/><span >Applications</span></a>
		<a href="news.php" id="link" class="active"><img src="img/news.png"/><span style="color: white;">Gaming News</span></a>
	</div>

	<div class="content" style="margin-top: 10px;">
		<h3 id="desc">Gaming Communities in Malawi</h3>
		<div class="game-display">
		
		<div class="card" id="infomatics">
  <img class="card-img-top" src="img/gdm.jpg" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">Game Developers of Malawi</h4>
    <p class="card-text">
      This is an online social group that contains all Malawian Game Developers. They share Ideas, concepts, help of any sort to each individual in need
    </p>
    <a href="https://chat.whatsapp.com/KDukhKVeYd85sMK5l7K48d" class="btn btn-primary" style="margin-bottom: 10px;">Join Now! <span class="badge badge-dark">Whatsapp</span></a>
    
  </div>
</div>
		
		<div class="card" id="infomatics">
  <img class="card-img-top" src="img/divtag.jpg" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">DIV Tag WebDevelopers</h4>
    <h6 class="card-subtitle mb-2 text-muted">over 250 members</h6>
    <p class="card-text">
    	If you are an aspiring application developer, join this group and learn from the pros on how to develop money making softwares and applications
    </p>
    <a href="#!" class="btn btn-primary disabled" style="margin-bottom: 10px;">Join Now! <span class="badge badge-dark">Whatsapp</span></a>

  </div>
</div>
		
		<div class="card" id="infomatics">
  <img class="card-img-top" src="img/gdm.jpg" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title">Malawi Video Gamers</h4>
    <p class="card-text">
      Need feedback for your upcoming game? Dont worry, with Malawi Video gamers you get to show case and test your working prototype to typical Malawian gamers
    </p>
    <a href="#!" class="btn btn-primary">Join Now! <span class="badge badge-dark">facebook</span></a>
  </div>
</div>

 <div class="alert alert-dark" role="alert" style="width: 100%;float: left;margin-top: 20px;">
    <strong>Blogs Know How</strong> 
</div>
  <div style="width: 100%;float: left;" id="blog">

    <div class="card">  
  <div class="card-body" id="how_to_make_video_games">
    <a href="read.php?t=how_to_make_video_games"><h4 class="card-title">How to make a Video Game in Malawi</h4></a>
    <h6 class="card-subtitle mb-2 text-muted">Written by Wongani Kaluwa | <?php echo $blogs->getViews("how_to_make_video_games") ?> views</h6>
    <p class="card-text">Making games is fun yet very time consuming. What makes it fun is the fact that you get to create a world with your own rules where the player gets to follow those rules...</p>
    <a href="#!" class="btn btn-primary">Comments <span class="badge badge-secondary"><?php echo $blogs->getCommentsCount("how_to_make_video_games") ?></span></a>
  </div>
</div>

<div class="card">  
  <div class="card-body" id="best_game_engine">
    <a href="read.php?t=best_game_engine"><h4 class="card-title">Best game engines for Developers </h4></a>
    <h6 class="card-subtitle mb-2 text-muted">Written by Wongani Kaluwa | <?php echo $blogs->getViews("best_game_engine") ?> views</h6>
    <p class="card-text">Unity, Godot, Unreal, Game Maker studio... which one do you choose? As a Malawian developer, a lot comes into your mind on which one is the best game engine. By the way, a Game Engine is an...</p>
    <a href="#!" class="btn btn-primary">Comments <span class="badge badge-secondary"><?php echo $blogs->getCommentsCount("best_game_engine") ?> </span></a>
  </div>
</div>

<div class="card">  
  <div class="card-body" id="how_to_make_money_from_applications">
    <a href="read.php?t=how_to_make_money_from_applications"><h4 class="card-title">Making Money with mobile app development</h4></a>
    <h6 class="card-subtitle mb-2 text-muted">Written by Wongani Kaluwa | <?php echo $blogs->getViews("how_to_make_money_from_applications") ?> views</h6>
    <p class="card-text">Making apps that people like and appreciate is not as simple as making just an app. Anyone can make an application even in just a few minutes. But what differentiates apps that make money and simple apps lies between...</p>
    <a href="#!" class="btn btn-primary">Comments <span class="badge badge-secondary"><?php echo $blogs->getCommentsCount("how_to_make_money_from_applications") ?></span></a>
  </div>
</div>

<div class="card">  
  <div class="card-body" id="submiting_your_game">
    <a href="read.php?t=submiting_your_game"><h4 class="card-title">How to submit a game or app to apps265</h4></a>
    <h6 class="card-subtitle mb-2 text-muted">Written by apps265 Team | <?php echo $blogs->getViews("submiting_your_game") ?> Views</h6>
    <p class="card-text">Working extra hard to make your game good, well know how you can easily publicise your hardwork with apps265 website.</p>
    <a href="#!" class="btn btn-primary">Comments <span class="badge badge-secondary"><?php echo $blogs->getCommentsCount("submiting_your_game") ?></span></a>
  </div>
</div>

<div class="card">  
  <div class="card-body">
    <h4 class="card-title">Desktop, Mobile and Web development, which one is a good approach</h4>
    <h6 class="card-subtitle mb-2 text-muted">Written by Wongani Kaluwa | 300 views</h6>
    <p class="card-text">A software is one of the most interesting thing ever came up with. Making one nowadays is easier and faster with all the frameworks availlable at our advantage...</p>
    <a href="#!" class="btn btn-primary">Like <span class="badge badge-secondary">20</span></a>
    <a href="#!" class="btn btn-primary">Comments <span class="badge badge-secondary">300</span></a>
  </div>
</div>


  </div>


	</div>

	</div>
<div style="width: 100%;float: left;">
  <?php require 'views/footer.php'; ?>
</div>
</body>
</html>