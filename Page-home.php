<?php 
	
/*
	Template Name: Page Home
*/
	
get_header(); ?>

<div class="graycontainer">

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

<?php get_footer(); ?>