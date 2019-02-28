<!doctype html>
<html lang="en">
  <head>

	<meta charset="utf-8">
			
        <title><?php bloginfo('title')?></title>
	<meta name="description" content="Hello World">
  <!-- Latest compiled and minified CSS -->
  
	​<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script
      src="https://code.jquery.com/jquery-3.3.1.js"
      integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
      crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  
	<!-- Optional theme -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Optional theme -->
	 <link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head()?>
</head>
<nav class="navbar navbar-expand-md  navbar-dark fixed-top">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><img src="<?php  bloginfo("template_url");?>/images/logo.png">
</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About us </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">causes </a>
	  </li> 
	  <li class="nav-item">
        <a class="nav-link" href="#">gallery</a>
      </li>  <li class="nav-item">
        <a class="nav-link" href="#">news</a>
      </li>  <li class="nav-item">
        <a class="nav-link" href="#">contact</a>
      </li> 
    </ul>
  </div> 
</nav>
	</header>
  <div class="col-md-12">

<div class="slides">
<?php 
echo do_shortcode('[smartslider3 slider=3]');
?>
</div> 
</div> 	