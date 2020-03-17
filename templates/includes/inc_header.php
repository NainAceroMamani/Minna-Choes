<!DOCTYPE html>
<html lang="es">
<head>
  <base href="">
  <meta charset="UTF-8">

  <title><?php echo isset($d->title) ? $d->title .' - '.get_sitename() : 'Bienvenido - '.get_sitename()  ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <script src="https://kit.fontawesome.com/882059baa9.js" crossorigin="anonymous"></script>

  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo CSS.'themify-icons.css' ?>">
  <link rel="stylesheet" href="<?php echo CSS.'bootstrap.css' ?>">
  <link rel="stylesheet" href="<?php echo CSS.'owl.carousel.css' ?>">
  <link rel="stylesheet" href="<?php echo CSS.'nice-select.css' ?>">
  <link rel="stylesheet" href="<?php echo CSS.'nouislider.min.css' ?>">
  <link rel="stylesheet" href="<?php echo CSS.'ion.rangeSlider.css' ?>">
  <link rel="stylesheet" href="<?php echo CSS.'ion.rangeSlider.skinFlat.css' ?>">
  <link rel="stylesheet" href="<?php echo CSS.'magnific-popup.css' ?>">
  <link rel="stylesheet" href="<?php echo CSS.'main2.css' ?>">
  
</head>

<body class="<?php echo isset($d->bg) && $d->bg === 'dark' ? 'bg-gradient' : 'bg-light' ?>">
<!-- ends inc_header.php -->
<!-- Start Header Area -->
  <header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="<?php echo UPLOADS.'/logo.png' ?>" alt="" width="60px"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="#">Inicio</a></li>
              				<li class="nav-item"><a class="nav-link" href="?comprar=6&prod=<?php echo (isset($_GET['prod']))? $_GET['prod'] : '' ; ?>"><i class="fas fa-cart-arrow-down" style="margin-right:10px"></i>Compras (<?php echo $num ?>)</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"><i class="fas fa-search"></i></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder=" Ingrese Producto a buscar">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->
