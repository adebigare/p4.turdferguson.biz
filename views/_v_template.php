<!DOCTYPE html>
<html>
<head>
	<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title><?php if(isset($title)) echo $title; ?></title>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="favicon.gif" type="image/gif">

	<link rel="stylesheet" type="text/css" href="/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="/css/foundation.css" />
	<link rel="stylesheet" type="text/css" href="/css/style.css" />
	<script src="/js/vendor/jquery.js"></script>
	<script src="/js/vendor/custom.modernizr.js"></script>
	<script src="/js/main.js"></script>
						
	<?php 
		if(isset($client_files_head)) echo $client_files_head; 
	?>
	
</head>

<body> 
	<!--Main Navigation -->
	<div id='menu'>

		<nav class="top-bar fixed" data-options="is_hover:false">
		 	<ul class="title-area">
				<li class="name">
					<h1><a href="/">Home</a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		 	</ul>

	 		<section class="top-bar-section">
				<ul class="right">
		 	  	<li class="divider"></li>
				<!-- Menu for users who are logged in -->
					<?php if($user): ?>
							<li class="divider"></li>
							<li><a href='/users/profile'>Profile</a></li>
							<li class="divider"></li>
							<li><a href='/users/relationships'>Collaborators</a></li>
							<li class="divider"></li>
							<li><a href='/users/logout'>Logout</a></li>

				<!-- Menu options for users who are not logged in -->
					<?php else: ?>
							<li class="divider"></li>
							<li><a href='/users/login'>Log in</a></li>
					<?php endif; ?>

				</ul>			
			</section>

		</nav>

	</div> 
<!-- End Navigation -->

<!-- Main content section -->
	<div id="main">

		<?php if(isset($subhead)): ?>
			<div class="subhead">
				<h1><?php echo $subhead?></h1>
			</div>
		<?php endif;?>


		<!-- Begin Masonry Layout -->
		<div id="container" class="masonry js-masonry">

				<?php if(isset($profile_widget)):?>

					<div id="profile_widget" class="stamp stamp_widget">
						<?php echo $profile_widget;?>
					</div>

				<?php endif;?>

				<!-- Add in a page heading, if available -->
					
				<!-- End Headings -->


		<!-- Grid for view with Profile Module -->

			  <div id="inserted-content">

			 		<?php if(isset($add_link)) echo $add_link; ?>
			 		<?php if(isset($content)) echo $content; ?>
			 	
			 	</div>

		</div>
		<?php if(isset($client_files_body)) echo $client_files_body; ?>
	</div>
	<div class="grid-sizer"></div>


	<script>
		document.write('<script src=' +
		('__proto__' in {} ? '/js/vendor/zepto' : '/js/vendor/jquery') +
		'.js><\/script>')
	</script>
	<script src="/js/vendor/zepto.js"></script>
	<script src="/js/vendor/jquery.js"></script>
	<script src="/js/foundation/foundation.js"></script>
	<script src="/js/foundation/foundation.topbar.js"></script>
	<script src="/js/foundation/foundation.section.js"></script>
	<script src="/js/foundation/foundation.reveal.js"></script>
	<script src="/js/foundation/foundation.magellan.js"></script>
	<script src="/js/masonry.pkgd.min.js"></script>
	<script src="http://cdn.embed.ly/jquery.embedly-3.1.1.min.js" type="text/javascript"></script>
	<script src="/js/imagesloaded.pkgd.min.js"></script>
	<script>
	  $(document).foundation();
	</script>

</body>
</html>