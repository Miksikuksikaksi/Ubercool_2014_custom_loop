<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta charset="UTF-8">
	<link href='http://fonts.googleapis.com/css?family=Crimson+Text' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php
		if(is_singular() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
			}
		wp_head();
	?>
</head>
<body>
	<div class="wrap">
		<div id="wrapper">
		
			<header>
			
			    <div class="mh-top-menu">
			    	<?php wp_nav_menu(array('menu' => 'Ubercoool' )); ?>
			    </div>
			    
			    <div class="search-toggle">
					<i class="fa fa-search"></i>
				</div>

				<br style="clear: both;">
				
				<div id="search-container" class="search-box-wrapper clear">
				    <div class="search-box clear">
				    	<?php get_search_form(); ?>
				    </div>
				</div>

			</header>