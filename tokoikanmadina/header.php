<?php
session_start();
include("koneksi.php");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">

	<!--====== Title ======-->
	<title>Toko Ikan Madina</title>

	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--====== Favicon Icon ======-->
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

	<!--====== Animate CSS ======-->
	<link rel="stylesheet" href="assets/css/animate.css">

	<!--====== Tiny slider CSS ======-->
	<link rel="stylesheet" href="assets/css/tiny-slider.css">

	<!--====== glightbox CSS ======-->
	<link rel="stylesheet" href="assets/css/glightbox.min.css">

	<!--====== Line Icons CSS ======-->
	<link rel="stylesheet" href="assets/css/LineIcons.2.0.css">
	
	<!--====== Selectr CSS ======-->
	<link rel="stylesheet" href="assets/css/selectr.css">

	<!--====== Nouislider CSS ======-->
	<link rel="stylesheet" href="assets/css/nouislider.css">

	<!--====== Bootstrap CSS ======-->
	<link rel="stylesheet" href="assets/css/bootstrap-5.0.5-alpha.min.css">

	<!--====== Style CSS ======-->
	<link rel="stylesheet" href="assets/css/style.css">

    <!--====== JQuery JS ======-->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
</head>

<body>
	<!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

	<!--====== PRELOADER PART START ======-->

	<div class="preloader">
		<div class="loader">
			<div class="ytp-spinner">
				<div class="ytp-spinner-container">
					<div class="ytp-spinner-rotator">
						<div class="ytp-spinner-left">
							<div class="ytp-spinner-circle"></div>
						</div>
						<div class="ytp-spinner-right">
							<div class="ytp-spinner-circle"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--====== PRELOADER PART ENDS ======-->

	<!--====== HEADER PART START ======-->

	<header class="header_area">
		<div id="header_navbar" class="header_navbar">
			<div class="container position-relative">
				<div class="row align-items-center">
					<div class="col-xl-12">
						<nav class="navbar navbar-expand-lg">
							<a class="navbar-brand" href="index.php">
								<img id="logo" src="assets/images/logo/logo.svg" alt="Logo">
							</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
								aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
								<span class="toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
								<ul id="nav" class="navbar-nav">
									<li class="nav-item">
										<a class="page-scroll" href="index.php">Profil</a>
									</li>
									<li class="nav-item">
										<a class="page-scroll" href="store.php">Store</a>
									</li>
									<?php if(isset($_SESSION["keranjang_ikan"]) && count($_SESSION["keranjang_ikan"]) > 0): ?>
										<li class="nav-item mx-5"></li>
										<li class="nav-item">
											<a class="page-scroll bg-danger text-light rounded" href="keranjang.php">Keranjang +<?=count(@$_SESSION['keranjang_ikan'])?></a>
										</li>
									<?php endif ?>
								</ul>
							</div>
							<ul class="header-btn d-md-flex">
								<li>
                                    <?php if(isset($_SESSION['akun'])): ?>
                                        <a class="main-btn account-btn">
										    <span class="d-none d-md-block">Halo, <?=$_SESSION['akun']?></span>
                                        </a>
                                        <ul class="dropdown-nav">
                                            <li><a href="ikan.php">Data Ikan</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    <?php else: ?>
                                        <a href="login.php" class="main-btn"> <span class="d-md-none"><i class="lni lni-user"></i></span>
										    <span class="d-none d-md-block">Login</span>
                                        </a>
                                    <?php endif ?>
								</li>
							</ul>
						</nav> <!-- navbar -->
					</div>
				</div> <!-- row -->
			</div> <!-- container -->
		</div> <!-- header navbar -->
	</header>

	<!--====== HEADER PART ENDS ======-->