<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Сайт про кактусы</title>
	<?php 
		wp_head();
		$site_title = get_field("site_title", 95); 
	?>
</head>
<body>
	<!-- MAIN-WRAP -->
	<div id="main-wrap">
		<!-- HEADER -->
		<header id="main-header">
			<!-- LOGO -->
			<div class="logo">
				<div class="container">
					<span class="logo-title">
						<?= $site_title ?>
					</span>
				</div>
			</div>
			<!-- END OF LOGO -->

			<!-- TOP-MENU -->
			<div class="top-menu">
				<div class="container">
					<?php 
						if ( function_exists( 'wp_nav_menu' ) )
			        		wp_nav_menu( 
						        array( 
						        'theme_location' => 'top-menu',
						        'fallback_cb'=> 'top_menu',
						        'container' => 'ul',
						        'menu_id' => 'top-menu-ul',
						        'menu_class' => 'nav') 
							);
					    else custom_menu();
					 ?>
				</div>
			</div>
			<!-- END OF TOP-MENU -->

			<!-- HEADER-CONTAINER -->
			<div class="container">
				 
			</div>
			<!-- END OF HEADER-CONTAINER -->
		</header>
		<!-- END OF HEADER -->
