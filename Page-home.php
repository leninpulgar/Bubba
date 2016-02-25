<?php 
	
/*
	Template Name: Page Home
*/
	
get_header(); ?>

<div class="graycontainer">


		<div class="row">
			<div class="orbit-container" role="region" aria-label="Favorite Space Pictures">
				<?php 
    echo do_shortcode("[metaslider id=60]"); 
?>
			</div><!--Fin del slider-->
		</div>


	<section class="news">
			<div class="row" data-equalizer>
				<div class="medium-6 column left1" data-equalizer-watch>
					<?php the_field('sea_mount_fishing_text'); ?>
					<div class="button-container">
						<a href="#" class="button">Find out more</a>
					</div>
				</div>
				<?php 
					$image = get_field('sea_mount_fishing_image');
					if( !empty($image) ): ?><div class="medium-6 column" style="display:block;background: url('<?php echo $image['url']; ?>') no-repeat right center;
                                background-size: cover;
                                min-height: 100%; !important
                                height: 100%;" data-equalizer-watch>
					<h4>SEA MOUNT FISHING</h4>
				</div><?php endif; ?>
			</div>
			<div class="row" data-equalizer>
				<?php 
					$image = get_field('sport_fishing_image');
					if( !empty($image) ): ?><div class="medium-6 column" style="display:block;background: url('<?php echo $image['url']; ?>') no-repeat right center;
    							background-size: cover;
    							min-height: 100%; !important
    							height: 100%;" data-equalizer-watch>
					<h4>SPORT FISHING</h4>
				</div><?php endif; ?>
				<div class="medium-6 column right2" data-equalizer-watch>
					<?php the_field('sport_fishing_text'); ?>
					<div class="button-container2">
						<a href="#" class="button">Find out more</a>
					</div>
				</div>
			</div>
		</section><!--Fin noticias-->

		<section class="about">
			<div class="row" data-equalizer>
				<div class="medium-5 large-6 column captain" data-equalizer-watch>
				
				<div class="panel">
					
					<?php 
					$image = get_field('captain_image');
					if( !empty($image) ): ?>
					<div style="display: block;
							    width: 100%;
							    height: 180px;
							    background: url('<?php echo $image['url']; ?>') no-repeat center;"></div><?php endif; ?>
					<div class="texto">
					<?php the_field('captain_text'); ?>
					<a href="#" class="button">Find out more</a>
					</div>
				</div>
				</div>

				<div class="medium-5 large-6 column tijereta" data-equalizer-watch>
				<div class="panel2">
					<?php 
					$image = get_field('tijereta_image');
					if( !empty($image) ): ?>
					<div style="display: block;
							    width: 100%;
							    height: 180px;
							    background: url('<?php echo $image['url']; ?>') no-repeat center;"></div><?php endif; ?>
					<div class="texto">
					<?php the_field('tijereta_text'); ?>
					<a href="#" class="button">Find out more</a>
					</div>
				</div>
				</div>
			</div>    
		</section><!--Fin del about-->

		<div class="row">
			<section class="report">
				<div class="row" data-equalizer>
				<?php query_posts('showposts=1'); ?>
			    <?php while (have_posts()) : the_post(); ?>
					<div class="medium-3 column" data-equalizer-watch>
						<?php the_post_thumbnail(); ?>
					</div>
					<div class="medium-9 column reportr" data-equalizer-watch>
						<h4><?php the_title(); ?></h4>
						<?php the_excerpt(); ?>
						<span class="post-time"><?php the_time('l, F j, Y' ); ?></span>
						<a href="#" class="button">See all reports</a>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_query(); // Restore global post data stomped by the_post(). ?>
				</div>
			</section><!--Fin del fishing report-->
		</div>

		<div class="row">
			<section class="letsdoit">
				<div class="row">
					<div class="medium-12 column">
						<?php the_field('epic_adventure'); ?>
						<a class="button" href="#">LETS DO IT!</a>
					</div>
				</div>
			</section>
		</div><!--Fin del epic adventure-->


<?php get_footer(); ?>