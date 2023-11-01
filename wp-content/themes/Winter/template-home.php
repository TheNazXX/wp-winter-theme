<?php

/**
 * Template name: Homepage Template
 */
?>

<?php get_header() ?>
  <article class="about-us-home cf">
    <aside class="about cf">
      <div class="img">
        <img src="<?php echo esc_url(get_post_meta(get_the_ID(), 'winter_about_photo', true))?>" alt="about us img" />
      </div>
      <div class="text">
        <?php if(get_post_meta(get_the_ID(), 'winter_about_title', true)){?>
          <h2><?php esc_html_e(get_post_meta(get_the_ID(), 'winter_about_title', true))?></h2>
        <?php }?>
        <?php if(get_post_meta(get_the_ID(), 'winter_about_desc', true)){?>
          <p><?php esc_html_e(get_post_meta(get_the_ID(), 'winter_about_desc', true))?></p>
        <?php }?>
        <?php if(get_post_meta(get_the_ID(), 'winter_about_link', true)){?>
          <a class="more" href="<?php esc_url(get_post_meta(get_the_ID(), 'winter_about_link', true))?>">More ></a>
        <?php }?>
      </div>
    </aside>
    <aside class="list">
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
</section>

<?php get_footer() ?>