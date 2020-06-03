<!DOCTYPE html>
<html>
<head>
	<title>APPS265 COMMUNITY BLOGS: <?php echo @$_REQUEST["t"] ?></title>
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

</head>
<?php 
  require 'data/Blogs.php';
  require 'data/gsComments.php';
  $blogs=new Blogs();
  $blogs->updateViews(@$_REQUEST["t"]);
  $comments=new Comments();
?>
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
		  <?php 
        if(@$_REQUEST["t"]!=""){
          echo file_get_contents("blogs/".$_REQUEST["t"].".php");
        }
      ?>

	 

          <?php 
            $comments->databaseLink="data/db_connection.php";
            $comments->table_name="blog_comments_".@$_REQUEST["t"];
            $comments->setView("views/comments_view.html");
            
           ?>
          <div class="response" >
      <a name="response"></a> 
      <form action="<?php echo '?t='.$_REQUEST['t'] ?>" method="POST" style="width: 90%;float: left;margin-left: 5%;margin-top: 20px;border:1px solid #ccc;padding: 10px;border-radius: 10px;"> 
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


            <div class="form-group" style="background: #ccc;">
        <?php
        if(isset($_SESSION["name"])){
            echo "<input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"enter name\" ".
            "value=\"".$_SESSION["name"]."\">";
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

<div style="width: 100%;float: left;">
  <!-- Footer -->
        <footer class="page-footer font-small mdb-color lighten-3 pt-4">

          <!-- Footer Elements -->
            <!--Grid row-->

          <!-- Footer Elements -->

          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://greenswitchdigital.com/apps265" style="color: grey;"> Green Switch Digital MW</a>
          </div>
          <!-- Copyright -->

        </footer>
        <!-- Footer -->
</div>
</body>
</html>