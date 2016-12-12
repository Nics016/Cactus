<?php 
get_header();
?>
<!-- MAIN -->
<main>
	<?php 
		$top_pic = get_field("top_pic");
	 ?>

	<!-- SLIDER -->
	<div class="slider">
		<div class="container">
			<img src="<?= $top_pic ?>" class="slider-pic">
		</div>
	</div>
	<!-- END OF SLIDER -->

	<!-- NEWS -->
	<div class="news">
		<div class="container">
			<div class="news-elements clearfix">
			<?php 
				// выводим посты категории Кактусы
				$archive_posts = new WP_Query("cat=11&posts_per_page=4");
				$i = 0;
				while ( $archive_posts->have_posts() ):
					$archive_posts->the_post();

					// обрезаем краткое описание
					$content = get_the_content();
					$content = get_short_content($content, 20);
					$date = get_the_date('d-m-Y');
			?>
				<div class="news-elements-item">
					<a href="<?php the_permalink(); ?>">
					<img src="<?=get_the_post_thumbnail_url() ?>"  class="news-elements-item-pic">
					</a>
					<span class="news-elements-item-text">
						<?= $content ?>
					</span>
					<span class="news-elements-item-date">
						<?= $date ?>
					</span>
					<a href="<?php the_permalink(); ?>" class="news-elements-item-more">Читать далее</a>
				</div>
			<?php 
				endwhile;
			 ?>
			</div>	
		</div>
	</div>
	<!-- END OF NEWS -->

	<!-- WELCOME -->
	<?php 
		if (have_posts()):
		while(have_posts()):
			the_post();
	 ?>
	<div class="welcome">
		<div class="container">
			<div class="welcome-container-wrapper clearfix">
				<div class="welcome-links clearfix">
					<?php 
						$i = 0;
						while (have_rows("bottom_pics")):
							the_row();
							$img = get_sub_field("bottom_pics_img");
							$link = get_sub_field("bottom_pics_link");
							$link = $link->guid;
							// var_dump($link);
					 ?>
					<a href="<?= $link ?>" class="welcome-links-item"><img src="<?= $img ?>" alt="random_article" class="welcome-links-item-pic"></a>
					<?php 
						endwhile;
					 ?>
				</div>

				<div class="welcome-info">
					<span class="welcome-info-title"><?php the_title(); ?></span>
					<span class="welcome-info-text">
						<?php the_content(); ?>
					</span>
				</div>
	<?php 
		endwhile;
		endif;
	 ?>
			</div>
		</div>
	</div>
	<!-- END OF WELCOME -->
</main>
<!-- END OF MAIN -->
<?php 
get_footer(); 
?>