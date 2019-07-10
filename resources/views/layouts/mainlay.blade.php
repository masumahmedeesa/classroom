<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Classroom | Virtual</title>
	<meta name="Classroom" content="It is a virtual Classroom" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/component.css" />
	<script src="js/modernizr-custom.js"></script>
</head>

<body>

	<!-- navigation -->
	<nav class="pages-nav">
		
	
		<div class="pages-nav__item"><h1><a class="link link--page" style="color:white;" href="#page-home">Home</a> </h1></div>
		<div class="pages-nav__item"><h1> <a class="link link--page" style="color:chartreuse;" href="#page-docu">Schedule</a> </h1></div>
		<div class="pages-nav__item"><h1> <a class="link link--page" style="color:magenta;" href="#page-manuals">Courses</a> </h1></div>
		<div class="pages-nav__item"><h1> <a class="link link--page" style="color:cyan;" href="#page-software">Posts</a></h1></div>
		<div class="pages-nav__item"><h1><a class="link link--page" style="color:deepskyblue;" href="#page-custom">Profile</a></h1></div>
		<div class="pages-nav__item"><h1><a class="link link--page" style="color:yellow;" href="#page-training">Stuffs</a></h1></div>
		<div class="pages-nav__item pages-nav__item--social">
			<a class="link link--social link--faded" href="#"><i class="fa fa-twitter"></i><span class="text-hidden">Twitter</span></a>
			<a class="link link--social link--faded" href="#"><i class="fa fa-linkedin"></i><span class="text-hidden">LinkedIn</span></a>
			<a class="link link--social link--faded" href="#"><i class="fa fa-facebook"></i><span class="text-hidden">Facebook</span></a>
			<a class="link link--social link--faded" href="#"><i class="fa fa-youtube-play"></i><span class="text-hidden">YouTube</span></a>
		</div>
	</nav>
	<!-- /navigation-->
	<!-- pages stack -->
	<div class="pages-stack">
		<!-- page -->
		<div class="page" id="page-home">
			<!-- Blueprint header -->
			<header class="bp-header cf">
				<span class="bp-header__present">Virtual Classroom <span class="bp-tooltip bp-icon bp-icon--about" data-content="The Blueprints are a collection of basic and minimal website concepts, components, plugins and layouts with minimal style for easy adaption and usage, or simply for inspiration."></span></span>
				<h1 class="bp-header__title">Classroom | HOME</h1>
				<h3 class="bp-header__desc">It will give you the latest activities, oh YES ! </h3>
				@yield('mainlayhome')
			</header>
			
			<!-- <img class="poster" src="images/1.jpg" alt="img01" /> -->
		</div>
		<!-- /page -->
		<div class="page" id="page-docu">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Schedule</h1>
				<h3 class="bp-header__desc"> Based on Daily Class Routine</h3>
				@yield('mainlayschedule')
			</header>
			
			<!-- <img class="poster" src="images/6.jpg" alt="img06" /> -->
		</div>
		<div class="page" id="page-manuals">
		<header class="bp-header cf">
				<h1 class="bp-header__title">Courses</h1>
				<h3 class="bp-header__desc"> Based on Courses</h3>
				@yield('mainlaycourses')
			</header>
			
			<!-- <img class="poster" src="images/2.jpg" alt="img02" /> -->
		</div>

		<div class="page" id="page-software">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Posts</h1>
				<h3 class="bp-header__desc"> Based on Posts</h3>
				@yield('mainlayposts')
			</header>
			

			<!-- <img class="poster" src="images/3.jpg" alt="img03" /> -->
		</div>
		<div class="page" id="page-custom">
		<header class="bp-header cf">
				<h1 class="bp-header__title">Profile</h1>
				<h3 class="bp-header__desc"> Based on Profile</h3>
				@yield('mainlayprofile')
			</header>
			
			<!-- <img class="poster" src="images/4.jpg" alt="img04" /> -->
		</div>
		<div class="page" id="page-training">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Stuffs</h1>
				<h3 class="bp-header__desc"> Based on Stuffs</h3>
				@yield('mainlaystuffs')
			</header>
			
			<!-- <img class="poster" src="images/5.jpg" alt="img05" /> -->
		</div>
		<!-- <div class="page" id="page-buy">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Where to buy</h1>
				<p class="bp-header__desc">Based on Ilya Kostin's Dribbble shot <a href="https://dribbble.com/shots/2286042-Stacked-navigation">Stacked navigation</a></p>
				<p class="info">
					"When people ask me why I don't eat meat or any other animal products, I say, 'Because they are unhealthy and they are the product of a violent and inhumane industry.'" &mdash;
				</p>
			</header>
			<img class="poster" src="images/6.jpg" alt="img06" />
		</div>
		<div class="page" id="page-blog">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Blog &amp; News</h1>
				<p class="bp-header__desc">Based on Ilya Kostin's Dribbble shot <a href="https://dribbble.com/shots/2286042-Stacked-navigation">Stacked navigation</a></p>
				<p class="info">
					"The question is not, 'Can they reason?' nor, 'Can they talk?' but rather, 'Can they suffer?" &mdash; Jeremy Bentham
				</p>
			</header>
			<img class="poster" src="images/1.jpg" alt="img01" />
		</div>
		<div class="page" id="page-contact">
			<header class="bp-header cf">
				<h1 class="bp-header__title">Contact</h1>
				<p class="bp-header__desc">Based on Ilya Kostin's Dribbble shot <a href="https://dribbble.com/shots/2286042-Stacked-navigation">Stacked navigation</a></p>
				<p class="info">
					"Man is the only animal that can remain on friendly terms with the victims he intends to eat until he eats them." &mdash; Samuel Butler
				</p>
			</header>
			<img class="poster" src="images/4.jpg" alt="img04" />
		</div> -->
	</div>
	<!-- /pages-stack -->
	<button class="menu-button"><span>Menu</span></button>
	<script src="js/classie.js"></script>
	<script src="js/main.js"></script>
</body>

</html>
