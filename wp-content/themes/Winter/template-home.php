<?php

/**
 * Template name: Homepage Template
 */
?>

<?php get_header() ?>
<article class="about-us-home cf">
  <aside class="about cf">
    <div class="img">
      <img src="<?php echo esc_url(get_post_meta(get_the_ID(), 'winter_about_photo', true)) ?>" alt="about us img" />
    </div>
    <div class="text">
      <?php if (get_post_meta(get_the_ID(), 'winter_about_title', true)) { ?>
        <h2><?php esc_html_e(get_post_meta(get_the_ID(), 'winter_about_title', true)) ?></h2>
      <?php } ?>
      <?php if (get_post_meta(get_the_ID(), 'winter_about_desc', true)) { ?>
        <p><?php esc_html_e(get_post_meta(get_the_ID(), 'winter_about_desc', true)) ?></p>
      <?php } ?>
      <?php if (get_post_meta(get_the_ID(), 'winter_about_link', true)) { ?>
        <a class="more" href="<?php esc_url(get_post_meta(get_the_ID(), 'winter_about_link', true)) ?>">More ></a>
      <?php } ?>
    </div>
  </aside>
  <aside class="list">
    <!-- Надо вывести с метабоксов -->
    <ul>
      <li class="cf">
        <div class="icon i1"></div>
        <a href="" class="caption">Lorem ipsum</a>
        <p>Lorem Ipsum is simply dummy text printing</p>
      </li>
      <li class="cf">
        <div class="icon i2"></div>
        <a href="" class="caption">Simple text here</a>
        <p>Lorem Ipsum is simply of the</p>
      </li>
      <li class="cf">
        <div class="icon i3"></div>
        <a href="" class="caption">Dummy text</a>
        <p>Lorem Ipsum is simply dummy text of the</p>
      </li>
    </ul>
  </aside>
</article>


<article class="recent-blog-home">
  <h2 class="title">Recent from blog</h2>

  <div class="items cf post_items">

    <?php
    $home_post = new WP_Query([
      'post_type' => 'post',
      'posts_per_page' => 4,  // -1 - Все посты
      // 'order' => 'ASC', // Посты выводяться с первых
    ]);

    while ($home_post->have_posts()) : $home_post->the_post(); ?>

      <div class="col-3 post_item">
        <a href="<?php the_permalink(); ?>">
          <?php echo get_the_post_thumbnail(get_the_ID(), 'post_front'); ?>
        </a>
        <div class="info cf">
          <div class="time"><?php echo get_the_date() ?></div>
          <a href="<?php the_permalink(); ?>" class="comments"><?php echo comments_number() ?></a>
        </div>
        <div class="text">
          <a href="<?php the_permalink(); ?>" class="caption"><?php esc_html_e(the_title()) ?></a>
          <p>
            <?php the_excerpt() ?>
          </p>
        </div>
      </div>


    <?php
    endwhile;
    wp_reset_postdata(); // Восстанавливаем контекст данных о текущей записи
    ?>

  </div>
</article>


<div class="center-align photo-gallery">
  <div class="top">
    <h2>Photo Gallery</h2>
  </div>

  <div id="photo-gallery">
    <ul class="slides">

    <?php
      $gallery_post = new WP_Query([
        'post_type' => 'winter_gallery',
        'posts_per_page' => 10,  // -1 - Все посты
    
      ]);

      $countPosts = wp_count_posts('winter_gallery')->publish;
      $countImagesOnSlide = 5;
      $currentImg = 0;

      for($i = 1; $i <= intval($countPosts / $countImagesOnSlide); $i++){?>
    
      <li>
        <div class="items<?php echo $i?>">
          <?php 
            for($j = 0; $j < $countImagesOnSlide; $j++){ 
              $gallery_post->the_post(); 
              $currentImg++;
              ?>

              <?php if($currentImg == 1 or $currentImg == 6){ ?>
                <a href="<?php the_permalink()?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery_one')?>
              </a>
              <?php } ?>

              <?php if($currentImg == 2 or $currentImg == 5 or $currentImg == 7 or $currentImg == 10){ ?>
                <a href="<?php the_permalink()?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery_two')?>
              </a>
              <?php } ?>

              <?php if($currentImg == 3 or $currentImg == 4 or $currentImg == 8 or $currentImg == 9){ ?>
                <a href="<?php the_permalink()?>"><?php echo get_the_post_thumbnail(get_the_ID(), 'gallery_three')?>
              </a>
              <?php } ?> 
      
            <?php } 
          ?>
        </div>
      </li>
      <?php wp_reset_postdata(); }?> 

    </ul>
  </div>

  <div class="back"></div>
  <div class="bottom"></div>
  <div class="anchor"></div>
</div>
</section>

<?php get_footer() ?>