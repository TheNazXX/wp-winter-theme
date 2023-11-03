<?php get_header(); ?>


<section class="center-align">
	<article class="blog">
			<div class="items cf">

			<?php if(have_posts()): while(have_posts()): the_post()?>
					<div class="col-3">
							<a href="<?php the_permalink()?>">
								<?php echo get_the_post_thumbnail(get_the_ID(), 'post_front')?>
							</a>
							<div class="info cf">
									<div class="time"><?php echo get_the_date()?></div>
									<a href="<?php the_permalink()?>" class="comments"><?php echo comments_number() ?></a>
							</div>
							<div class="text">
									<a href="<?php the_permalink()?>" class="caption"><?php the_title()?></a>
									<p>
										<?php the_excerpt() ?>
									</p>
							</div>
							<div class="wave"></div> 
					</div>	

					<?php endwhile; endif;?>
			</div>
	</article>
</section>




<div class="pagination">
	<?php echo paginate_links([
		'prev_next' => false,
		'current_class' => 'active'
	]); ?>

</div>

</section>
<?php get_footer(); ?>
