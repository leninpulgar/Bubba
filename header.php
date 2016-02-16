<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html lang="es" class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 <title itemprop="name"><?php bloginfo('name'); ?><?php wp_title(); ?></title>
 <meta name="description" content="">
 <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
 <meta name="robots" content="index, follow">
<?php wp_head(); ?>
</head>

<body id="<?php the_ID(); ?>" <?php body_class(); ?>>
 <!--[if lt IE 7]>
 <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
 <![endif]-->
 
	<div class="row">
		<header>
			<h1 class="titlebubba">CAPT. BUBBA CARTER</h1>
			<h3 class="subtitlebubba">SPORT FISHING IN COSTA RICA</h3>
			<div class="redes">
				<ul>
					<li><a class="twitter" href=""><span class="invisible">twitter</span></a></li>
					<li><a class="facebook" href=""><span class="invisible">facebook</span></a></li>
				</ul>
			</div>
			<!--burger toggle-->
			<div style="display:block;" class="menu" data-responsive-toggle="menu" data-hide-for="medium">
        		<button style="margin:2rem;" class="menu-icon" type="button" data-toggle></button>
        		<div class="title-bar-title">Menu</div>
      		</div>
      		<!--burger toggle end-->

			<nav id="menu" class="menu">
                <?php wp_nav_menu( 
					array(
						'menu_class' => 'row',
						'fallback_cb' => 'wp_page_menu',
					)
				);?>
            </nav>
		</header>
	</div>