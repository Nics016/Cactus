<?php get_header();?>
<!-- MAIN -->
<main> 
	<?php 
		if (have_posts()):
			while(have_posts()):
				the_post();
	 ?>
	<!-- ARTICLE -->
	<div class="single-article">
		<div class="container">
			<div class="single-article-wrapper">
				<span class="single-article-title">
					<?php the_title(); ?>
				</span>
				<div class="single-article-textbox">
					<span class="single-article-text clearfix">
						<?php 
							$img = get_the_post_thumbnail_url();
							
							if ($img):
						 ?>
						<img src="<?= $img  ?>" class="single-article-pic">
						<?php 
							endif;
						the_content(); 
						?>
					</span>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF ARTICLE -->
	<?php 
			endwhile;
		endif;
	 ?>

<?php 
	comments_template();
 ?>
</main>
<!-- END OF MAIN -->
<?php get_footer(); ?>