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
	<link rel="icon" href="../img/classic.png">
	
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	
	<meta charset="utf-8" name="description" content="games malawi, games made in Malawi, malawi games">
	<!-- <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1"> -->
	<title>APPS265 Developer Console</title>
	<meta charset="utf-8" name="description" content="If you develop applications or games, get your product through this console designed for local developers.">
</head>
<body style="background: rgba(250,250,250,0.8);">
	<div class="fixed-bottom bg-dark" id="cookie_panel" style="padding: 20px;bottom: 0%;transition: 600ms ease-in-out;">
		<p style="color: white;margin: 0px;">This site Uses Cookies and Javascript make sure they are enabled <button class="btn btn-light" onclick="get('cookie_panel').style.bottom='-50%'">Okay</button></p>

	</div>
		<div >
		<nav class="navbar navbar-expand-lg " style="background:rgba(0,0,0,0.8); " >
  <a class="navbar-brand" href="../index.php" style="color: white;">APPS265</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon" style="color: white;"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="../index.php" style="color: white;">Back <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
    <div class="form-inline my-2 my-lg-0" >
      <input class="form-control mr-sm-2" type="text" placeholder="username" aria-label="Search" name="username">
      <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Search" name="password">
      <input type="hidden" name="genre" value="all">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign in</button>
    </div>
  </div>
</nav>
	</div>

	<div id="content" style="padding: 50px;">
		
		<h1>This page is currently under development</h1>
		<h5>All developers will get notified through their email address when finished</h5>
		<ul style="margin-top: 100px;">
			<li>Download Developer Application Form <a href="apps265_developer_form.pdf">Here</a></li>
			<li>Apply Directly to <a href="mail.google.com">info@apps265.com</a></li>
			<li>Contribute at github <a href="#">Here</a></li>
			<br><br>
			<li style="list-style-type: none;"><button class="btn btn-dark">Donate</button></li>
		</ul>
	</div>

	<div class="game_hover_icon">
	

	</div>
<div style="width: 100%;float: left;">
<?php 
 require '../views/footer.php';
 ?>
</div>
</body>
</html>