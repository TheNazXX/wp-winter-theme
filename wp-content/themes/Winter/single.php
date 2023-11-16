<?php get_header(); ?>

<section class="center-align">


  <!-- Blog Single -->
  <?php while (have_posts()) : the_post() ?>
  <article class="blog-single">

    <div class="img">
      <div class="img-bord">
        <?php echo get_the_post_thumbnail($post->ID, 'post_single') ?>
      </div>
      <div class="info cf">
        <span class="time"><?php echo get_the_date() ?></span>
        <span class="comments"><?php echo comments_number(); ?></span>
        <span class="by"
          style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/images/admin.png');"><?php echo get_the_author() ?></span>
      </div>
      <div class="wave"></div>
    </div>

    <?php the_content(); ?>
    <!-- -->


    <div class="category cf">
      <h4 class="categ">Category: <?php the_category(', ') ?>/ Tags: <?php the_tags('', ', ', '') ?></h4>
      <div class="share">
        <h4>Share: </h4>
        <ul>
          <li class="facebook"><a
              onclick="window.open(this.href, 'Share on Facebook', 'width=600,height=300'); return false"
              href="<?php echo ale_get_share('fb', get_the_permalink(), get_the_title()); ?>"></a></li>
          <li class="pinterest"><a
              onclick="window.open(this.href, 'Share on Pinteres', 'width=600,height=300'); return false"
              href="<?php echo ale_get_share('pin', get_the_permalink(), get_the_title()); ?>"></a></li>
          <li class="twitter"><a
              onclick="window.open(this.href, 'Share on Twitter', 'width=600,height=300'); return false"
              href="<?php echo ale_get_share('twi', get_the_permalink(), get_the_title()); ?>"></a></li>
        </ul>
      </div>
    </div>

    <?php comments_template()?>



  </article>
  <?php endwhile; ?>

</section>

</section>
<?php

get_footer();