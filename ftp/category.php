<?php get_header();?>
<!-- MAIN -->
<main> 
	<?php 
		$cat_title = single_term_title("", false);
	?>

	<!-- CATEGORY -->
	<div class="category">
		<div class="container">
			<div class="category-wrapper">
				<span class="category-title">
					<?= $cat_title ?>
				</span>
	<?php
		if (have_posts()):
			while(have_posts()):
				the_post();
				$img = get_the_post_thumbnail_url();
				$content = get_the_content();
				$content = get_short_content($content, 50);
				$date = get_the_date("d-m-Y");
	 ?>
	 			<div class="category-post clearfix">
	 				<a href="<?php the_permalink(); ?>" class="category-post-pic-link">
	 					<img src="<?= $img ?>" alt="" class="category-post-pic">
	 				</a>
	 				<div class="category-post-info">
		 				<a href="<?php the_permalink(); ?>" class="category-post-info-title">
		 					<?php the_title(); ?>
		 				</a>
		 				<span class="category-post-info-description">
		 					<?= $content ?>
		 				</span>
	 				</div>
	 				<span class="category-post-date">
	 					<?= $date ?>
	 				</span>
	 				<a href="<?php the_permalink(); ?>" class="category-post-more">Читать далее</a>
	 			</div>
	<?php 
			endwhile;
		endif;
	 ?>
	 		</div>
	 	</div>
	 </div>
	 <!-- END OF CATEGORY -->

</main>
<!-- END OF MAIN -->
<?php get_footer(); ?>