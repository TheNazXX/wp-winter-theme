<?php 

?>

<?php get_header() ?>


<?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>

<?php $query = new WP_Query([
  'post_type' => 'winter_rooms',
  'posts_per_page' => (isset($winter_options['rooms_count']) ? $winter_options['rooms_count'] : 6),
  'paged' => $paged
]);

?>



<article class="rooms">

  <?php if ( $query->have_posts() ) : $i = 0; while ( $query->have_posts() ) : $query->the_post(); ?>

  <?php if($i % 2 == 0):?><div class="line cf"><?php endif;?>
    <div class="col-6">
      <div class="col-6 text">
        <h3><a href="<?php echo get_permalink()?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt()?>
        <a class="more" href="<?php echo esc_url(get_permalink())?>">More ></a>
      </div>
      <div class="col-6 img">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'room_photo')?>
      </div>
    </div>
    <?php if($i % 2 != 0):?>
  </div><?php endif;?>


  <?php $i++; endwhile; endif; wp_reset_postdata();?>

</article>

<div class="pagination">
  <?php echo paginate_links([
		'prev_next' => false,
		'current_class' => 'active',
    'total'    => $query->max_num_pages, // Общее количество страниц.
	]); ?>
</div>




</section>
<?php get_footer() ?>