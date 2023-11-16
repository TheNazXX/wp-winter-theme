<?php get_header(); ?>


<article class="gallery">

  <?php $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; ?>

  <?php 
    $query = new WP_Query([
      'post_type' => 'winter_gallery',
      'posts_per_page' => 10,
      'paged' => $paged,
      'order' => 'ASC', // Посты выводяться с первых
    ]);
  
  ?>
  <div class="items1 cf">
    <?php if( $query->have_posts() ) : $i = 1; while( $query->have_posts()) : $query->the_post(); ?>

    <?php if($i == 1 or $i == 6){ ?>
    <a href="<?php the_permalink()?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery_one')?>
    </a>
    <?php } ?>

    <?php if($i == 2 or $i == 5 or $i == 7 or $i == 10){ ?>
    <a href="<?php the_permalink()?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery_two')?>
    </a>
    <?php } ?>

    <?php if($i == 3 or $i == 4 or $i == 8 or $i == 9){ ?>
    <a href="<?php the_permalink()?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery_three')?>
    </a>
    <?php } ?>

    <?php if($i == 5): ?>
  </div>
  <div class="items2 cf">
    <?php endif;?>

    <?php $i++; endwhile; endif; wp_reset_postdata(); ?>

  </div>


</article>


<div class="pagination">
  <?php echo paginate_links([
		'prev_next' => false,
		'current_class' => 'active',
    'total'    => $query->max_num_pages, // Общее количество страниц.
	]); ?>

</div>

</section>




<?php get_footer(); ?>