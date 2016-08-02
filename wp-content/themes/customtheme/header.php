<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

    <link rel="shortcut icon" type="image/png" href="favicon.png" />
    
	<link rel="stylesheet" type="text/css" href="./wp-content/themes/customtheme/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./wp-content/themes/customtheme/style.css">
	<link rel='stylesheet' href='./wp-content/themes/customtheme/css/font-awesome.min.css'/>
	<link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<script src="./wp-content/themes/customtheme/js/jquery-2.1.0.min.js"></script>
	<script src="./wp-content/themes/customtheme/js/bootstrap.min.js"></script>
	<script src="./wp-content/themes/customtheme/js/blocs.min.js"></script>
	<title>Home</title>

</head>
<body <?php body_class(); ?>>
<!-- Main container -->
<div class="page-container">
    
<!-- bloc-0 -->
<div class="bloc bgc-white l-bloc" id="bloc-0">
	<div class="container bloc-sm">
		<nav class="navbar row  navbar-fixed-top" style="background-color:#fff;border-bottom: solid 3px rgba(16, 183, 101,0.6)">
			<div class="navbar-header col-sm-offset-1 col-sm-2">
				<a class="navbar-brand" href="index.html"><img src="img/hello-guest-logo.svg" alt="logo" width="180px"/></a>
				<button id="nav-toggle" type="button" class="ui-navbar-toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
					<span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse navbar-1">
				<ul class="site-navigation nav navbar-nav">
					<li>
						<a href="index.html">Home</a>
					</li>
					<li>
						<a href="index.html">Blog</a>
					</li>
					<li>
						<a href="index.html">Pricing</a>
					</li>
					<li>
						<a href="index.html">Services</a>
					</li>
					<li>
						<a href="index.html">About</a>
					</li>
					<li>
						<a href="index.html">Team</a>
					</li>
					<li>
						<a href="index.html">Testimonials</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>
<!-- bloc-0 END -->