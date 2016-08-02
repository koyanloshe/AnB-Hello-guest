<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<!-- bloc-1 -->
<div class="bloc bgc-white l-bloc" id="bloc-1" style="padding:0px;">
		<div class="row">
			<div class="col-sm-12">
				<div id="carousel-1" class="carousel no-shadows slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-1" data-slide-to="0" class="active">
						</li>
						<li data-target="#carousel-1" data-slide-to="1">
						</li>
						<li data-target="#carousel-1" data-slide-to="2">
						</li>
					</ol>
					<div class="carousel-inner">
						<div class="item active">
						<?php if ($video) : ?>
							<video src="https://www.youtube.com/embed/><? echo "$video";?>"></video>
						<?php else : ?>
							<img src="img/placeholder-image-wide.png"/>
						<?php endif; ?>
							<div class="carousel-caption">
								<h1 class="white">THIS IS TEMPORARY TEXT</h1>
								<a href="" class="btn btn-lg bot white">WATCH NOW</a>
							</div>
						</div>
						<div class="item">
							<img src="img/placeholder-image-wide.png" />
							<div class="carousel-caption">
								<h1 class="white">THIS IS TEMPORARY TEXT</h1>
								<a href="" class="btn btn-lg bot white">WATCH NOW</a>
							</div>
						</div>
						<div class="item">
							<img src="img/placeholder-image-wide.png" />
							<div class="carousel-caption">
								<h1 class="white">THIS IS TEMPORARY TEXT</h1>
								<a href="" class="btn btn-lg bot white">WATCH NOW</a>
							</div>
						</div>
					</div><a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev"><span class="fa fa-chevron-left"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-1" role="button" data-slide="next"><span class="fa fa-chevron-right"></span><span class="sr-only">Next</span></a>
				</div>
			</div>
		</div>
</div>
<!-- bloc-1 END -->

<!-- Bloc Group -->
<div class='bloc-group'>

<!-- bloc-2 -->
<div class="bloc bloc-tile-4 bgc-white l-bloc" id="bloc-2">
	<div class="container bloc-md">
		<div class="row bgc-white">
			<div class="col-xs-offset-0 col-xs-12 col-sm-offset-2 col-sm-10">
				<h2 class="mg-md">
					Heading content
				</h2>
			</div>
		</div>
	</div>
</div>
<!-- bloc-2 END -->

<!-- bloc-3 -->
<div class="bloc bloc-tile-2 bgc-white l-bloc" id="bloc-3">
	<div class="container bloc-md">
		<div class="row">
			<div class="col-sm-11">
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
				</p>
			</div>
		</div>
	</div>
</div>
<!-- bloc-3 END -->
</div>
<!-- Bloc Group END -->

<!-- Bloc Group -->
<div class='bloc-group'>

<!-- bloc-4 -->
<div class="bloc bloc-tile-3 bgc-white l-bloc" id="bloc-4">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="mg-md">
					<span class="fa fa-comments-o"></span> Heading content
				</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
				</p>
			</div>
		</div>
	</div>
</div>
<!-- bloc-4 END -->

<!-- bloc-5 -->
<div class="bloc bloc-tile-3 bgc-white l-bloc" id="bloc-5">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="mg-md">
					<span class="fa fa-user alt"></span> Heading content
				</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
				</p>
			</div>
		</div>
	</div>
</div>
<!-- bloc-5 END -->

<!-- bloc-6 -->
<div class="bloc bloc-tile-3 bgc-white l-bloc" id="bloc-6">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="mg-md">
					<span class="fa fa-users"></span> Heading content
				</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
				</p>
			</div>
		</div>
	</div>
</div>
<!-- bloc-6 END -->
</div>
<!-- Bloc Group END -->

<!-- Bloc Group -->
<div class='bloc-group'>

<!-- bloc-7 -->
<div class="bloc bloc-tile-3 bgc-white l-bloc" id="bloc-7">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="mg-md">
					<span class="fa fa-stack-exchange alt"></span> Heading content
				</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
				</p>
			</div>
		</div>
	</div>
</div>
<!-- bloc-7 END -->

<!-- bloc-8 -->
<div class="bloc bloc-tile-3 bgc-white l-bloc" id="bloc-8">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="mg-md">
					<span class="fa fa-laptop"></span> Heading content
				</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
				</p>
			</div>
		</div>
	</div>
</div>
<!-- bloc-8 END -->

<!-- bloc-9 -->
<div class="bloc bloc-tile-3 bgc-white l-bloc" id="bloc-9">
	<div class="container bloc-sm">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="mg-md">
					<span class="fa fa-clock-o alt"></span> Heading content
				</h3>
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
				</p>
			</div>
		</div>
	</div>
</div>
<!-- bloc-9 END -->
</div>
<!-- Bloc Group END -->

<!-- bloc-10 -->
<div class="bloc bgc-white l-bloc" id="bloc-10">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="mg-md text-center">
					Heading content
				</h1>
				<p class="text-center pads-t">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
				</p>
				<div class="text-center pads-t">
					<a href="index.html" class="btn btn-d btn-lg">Button</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-10 END -->

<!-- bloc-11 -->
<div class="bloc bgc-white l-bloc" id="bloc-11">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-6">
				<h2 class="mg-lg">
					Feature title
				</h2>
				<h3 class="mg-sm">
					A more descriptive sub heading.
				</h3>
				<p class="mg-lg">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
				</p>
				<div class="col-sm-12 text-center1"><a href="index.html" class="btn  btn-d  btn-lg">Watch Demo</a></div>
			</div>
			<div class="col-sm-6 col-xs-offset-0">
				<img src="img/placeholder-image.png" class="img-responsive" />
			</div>
		</div>
	</div>
</div>
<!-- bloc-11 END -->

<!-- bloc-12 -->
<div class="bloc bgc-white l-bloc" id="bloc-12">
	<div class="container bloc-md">
		<div class="row">
			<div class="col-sm-offset-0 col-sm-10 col-xs-offset-1 col-xs-10">
				<h3 class="mg-md">
					Enter your e-mail to get updates
				</h3>
			</div>
			<div class="col-sm-2 col-xs-12 text-center">
				<a href="index.html" class="btn  btn-d  btn-lg">Subscribe now</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-12 END -->

<!-- Bloc Group -->
<div class='bloc-group'>

<!-- bloc-13 -->
<div class="bloc bloc-tile-2 bgc-white l-bloc" id="bloc-13">
	<div class="container bloc-md">
		<div class="row">
			<div class="col-sm-12">
			</div>
		</div>
	</div>
</div>
<!-- bloc-13 END -->

<!-- bloc-14 -->
<div class="bloc bloc-tile-2 bgc-white l-bloc" id="bloc-14">
	<div class="container bloc-md">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="mg-md">
					Heading content
				</h3>
				<hr align="left">
				<p>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
				</p>
			</div>
		</div>
	</div>
</div>
<!-- bloc-14 END -->
</div>
<!-- Bloc Group END -->

<!-- bloc-15 -->
<div class="bloc bgc-white l-bloc" id="bloc-15">
	<div class="container bloc-lg">
		<div class="row">
			<div class="text-center col-sm-3 col-xs-6">
				<h3 class="stat-bloc-text text-center">
					1289
				</h3>
				<hr>
				<p class="stat-bloc-sub-text">
					Tweets
				</p>
			</div>
			<div class="text-center col-sm-3 col-xs-6">
				<h3 class="stat-bloc-text">
					2205
				</h3>
				<hr>
				<p class="stat-bloc-sub-text">
					Followers
				</p>
			</div>
			<div class="text-center col-sm-3 col-xs-6">
				<h3 class="stat-bloc-text">
					20K
				</h3>
				<hr>
				<p class="stat-bloc-sub-text">
					Likes
				</p>
			</div>
			<div class="text-center col-sm-3 col-xs-6">
				<h3 class="stat-bloc-text">
					612
				</h3>
				<hr>
				<p class="stat-bloc-sub-text">
					Cups of tea
				</p>
			</div>
		</div>
	</div>
</div>
<!-- bloc-15 END -->

<!-- bloc-16 -->
<div class="bloc bgc-white l-bloc" id="bloc-16">
	<div class="container bloc-md">
		<div class="row">
			<div class="col-sm-offset-0 col-sm-10 col-xs-offset-1 col-xs-10">
				<h3 class="mg-md">
					Enter your e-mail to get updates
				</h3>
			</div>
			<div class="col-sm-2 col-xs-12 text-center">
				<a href="index.html" class="btn  btn-d  btn-lg">Subscribe now</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-16 END -->

<!-- bloc-17 -->
<div class="bloc bgc-white l-bloc" id="bloc-17">
	<div class="container bloc-md">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="text-center mg-md">
					Meet our team
				</h2>
				<hr>
				<p class="sub-heading text-center">
					We are a group of skilled individuals.
				</p>
			</div>
		</div>
		<div class="row voffset-lg">
			<div class="col-sm-offset-0 col-sm-2 col-xs-offset-3 col-xs-6">
				<img src="img/placeholder-user.png" class="img-responsive img-circle" />
			</div>
			<div class="col-sm-offset-0 col-sm-4 col-xs-offset-1 col-xs-10">
				<h3 class="mg-md">
					John Doe
				</h3>
				<p class="play">Designer</p>
				<p>
					Lorem ipsum dolor sit amet, adipiscing elit Aenean commodo ligula eget.
				</p><br /><a href="index.html" target="_blank"><span class="fa fa-twitter icon-sm pull-left"></span></a><a href="index.html" target="_blank"><span class="fa fa-facebook icon-sm pull-left"></span></a><a href="index.html" target="_blank"><span class="fa fa-linkedin icon-sm pull-left"></span></a>
			</div>
			<div class="col-sm-offset-0 col-sm-2 col-xs-offset-3 col-xs-6">
				<img src="img/placeholder-user.png" class="img-responsive img-circle" />
			</div>
			<div class="col-sm-offset-0 col-sm-4 col-xs-offset-1 col-xs-10">
				<h3 class="mg-md">
					John Doe
				</h3>
				<p class="play">Designer</p>
				<p>
					Lorem ipsum dolor sit amet, adipiscing elit Aenean commodo ligula eget.
				</p><br /><a href="index.html" target="_blank"><span class="fa fa-twitter icon-sm pull-left"></span></a><a href="index.html" target="_blank"><span class="fa fa-facebook icon-sm pull-left"></span></a><a href="index.html" target="_blank"><span class="fa fa-linkedin icon-sm pull-left"></span></a>
			</div>
		</div>
		<div class="row voffset-lg">
			<div class="col-sm-offset-0 col-sm-2 col-xs-offset-3 col-xs-6">
				<img src="img/placeholder-user.png" class="img-responsive img-circle" />
			</div>
			<div class="col-sm-offset-0 col-sm-4 col-xs-offset-1 col-xs-10">
				<h3 class="mg-md">
					John Doe
				</h3>
				<p class="play">Designer</p>
				<p>
					Lorem ipsum dolor sit amet, adipiscing elit Aenean commodo ligula eget.
				</p><br /><a href="index.html" target="_blank"><span class="fa fa-twitter icon-sm pull-left"></span></a><a href="index.html" target="_blank"><span class="fa fa-facebook icon-sm pull-left"></span></a><a href="index.html" target="_blank"><span class="fa fa-linkedin icon-sm pull-left"></span></a>
			</div>
			<div class="col-sm-offset-0 col-sm-2 col-xs-offset-3 col-xs-6">
				<img src="img/placeholder-user.png" class="img-responsive img-circle" />
			</div>
			<div class="col-sm-offset-0 col-sm-4 col-xs-offset-1 col-xs-10">
				<h3 class="mg-md">
					John Doe
				</h3>
				<p class="play">Designer</p>
				<p>
					Lorem ipsum dolor sit amet, adipiscing elit Aenean commodo ligula eget.
				</p><br /><a href="index.html" target="_blank"><span class="fa fa-twitter icon-sm pull-left"></span></a><a href="index.html" target="_blank"><span class="fa fa-facebook icon-sm pull-left"></span></a><a href="index.html" target="_blank"><span class="fa fa-linkedin icon-sm pull-left"></span></a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-17 END -->

<!-- bloc-18 -->
<div class="bloc bgc-white l-bloc" id="bloc-18">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-12">
				<h1 class="mg-md text-center">
					Heading content
				</h1>
				<p class="text-center padm-t">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
				</p>
				<div class="text-center padm-t">
					<a href="index.html" class="btn  btn-d  btn-lg">Button</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- bloc-18 END -->

<!-- bloc-19 -->
<div class="bloc bgc-white l-bloc " id="bloc-19">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-2 col-sm-offset-5 col-xs-6 col-xs-offset-3">
				<img src="img/placeholder-user.png" class="img-responsive img-circle" />
			</div>
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<h3 class="statement-bloc-text">
					"Eventually everything connects - people, ideas, objects. The quality of the connections is the key to quality per se."
				</h3>
				<p class="text-center">
					<strong>Charles Eames</strong>
				</p>
			</div>
		</div>
	</div>
</div>
<!-- bloc-19 END -->

<!-- bloc-20 -->
<div class="bloc bgc-white l-bloc" id="bloc-20">
	<div class="container bloc-md">
		<div class="row">
			<div class="col-sm-offset-0 col-sm-10 col-xs-offset-1 col-xs-10">
				<h3 class="mg-md">
					Enter your e-mail to get updates
				</h3>
			</div>
			<div class="col-sm-2 col-xs-12 text-center">
				<a href="index.html" class="btn  btn-d  btn-lg">Subscribe now</a>
			</div>
		</div>
	</div>
</div>
<!-- bloc-20 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1')"><span class="fa fa-chevron-up"></span></a>
<!-- ScrollToTop Button END-->


<?php get_footer(); ?>