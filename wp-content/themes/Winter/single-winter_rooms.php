<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<article class="rooms-opened cf">
  <?php $slider_images = get_post_meta(get_the_ID(), 'ale_gallery_id', true)?>
  <?php $currentPostId = get_the_ID(); ?>
  <?php if($slider_images): ?>
  <div id="room-slider">
    <ul class="slides">
      <?php foreach($slider_images as $slider_image){ ?>
      <li>
        <?php echo wp_get_attachment_image($slider_image, 'full');?>
      </li>
      <?php }; ?>
    </ul>
  </div>
  <?php endif; ?>

  <?php the_content(); ?>

</article>

<?php endwhile; endif; wp_reset_postdata();?>

<article class="rooms opened">
  <h2 class="title">Other Rooms</h2>
  <div class="line cf">
    <?php
    $other_rooms = new WP_Query([
      'post_type' => 'winter_rooms',
      'posts_per_page' => 3,
      'orderby' => 'rand'
    ]);

    if ($other_rooms->have_posts()) : $i = 0;
      while ($other_rooms->have_posts()) : $other_rooms->the_post();

        if ($currentPostId == get_the_ID()) {
          continue;
        }

        if ($i == 2) {
          break;
        }
    ?>
    <div class="col-6">
      <div class="col-6 text">
        <h3><a href="<?php echo esc_url(get_permalink()) ?>"><?php the_title(); ?></a></h3>
        <?php the_excerpt(); ?>
        <a class="more" href="<?php echo esc_url(get_permalink()) ?>">More ></a>
      </div>
      <div class="col-6 img">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'room_photo'); ?>
      </div>
    </div>
    <?php
        $i++;
      endwhile;
    endif;

    // Восстанавливаем оригинальные данные поста после цикла
    wp_reset_postdata();
    ?>
  </div>
</article>

</section>



<?php get_footer(); ?>