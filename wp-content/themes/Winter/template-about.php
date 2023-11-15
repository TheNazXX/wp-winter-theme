<?php 
/**
* Template name: About Template
*/
?>

<?php get_header() ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<article class="about-us cf">
  <div class="col-6 text">
    <?php the_content(); ?>
  </div>


  <?php 
    $slides_images = get_post_meta(get_the_ID(), 'ale_gallery_id', true);
    if(!empty($slides_images)){
  ?>

  <div class="col-6 slider">
    <div id="about-slider">
      <ul class="slides">
        <?php foreach($slides_images as $slides_image){?>
        <li>
          <?php echo wp_get_attachment_image($slides_image, 'full')?>
        </li>
        <?php }?>
      </ul>
    </div>
  </div>

  <?php }?>
</article>

<!-- -->
<div class="dotted-line"></div>

<!-- Our Teachers -->
<article class="our-teachers cf">
  <h2 class="title"><?php 
    if(!empty(get_post_meta(get_the_ID(), 'winter_teachers_section_title', true))){
      esc_html_e(get_post_meta(get_the_ID(), 'winter_teachers_section_title', true));
    }else{
      echo 'Our Teachers';
    };
  ?></h2>

  <div class="teachers">
    <?php $query = new WP_Query([
    'post_type' => 'winter_teachers'
    ])?>

    <?php if($query->have_posts()): while($query->have_posts()): $query->the_post()?>

    <div class="col-4">
      <div class="back-frame">
        <div class="image">
          <?php echo get_the_post_thumbnail(get_the_ID(), 'teacher_photo'); ?>
          <ul>
            <?php if(!empty(get_post_meta(get_the_ID(), 'winter_teacher_facebook', true))): ?>
            <li class="facebook"><a
                href="<?php echo esc_url(get_post_meta(get_the_ID(), 'winter_teacher_facebook', true))?>"></a></li>
            <?php endif; ?>

            <?php if(!empty(get_post_meta(get_the_ID(), 'winter_teacher_pinterest', true))): ?>
            <li class="pinterest"><a
                href="<?php echo esc_url(get_post_meta(get_the_ID(), 'winter_teacher_pinterest', true))?>"></a>
            </li>
            <?php endif; ?>

            <?php if(!empty(get_post_meta(get_the_ID(), 'winter_teacher_twitter', true))): ?>
            <li class="twitter"><a
                href="<?php echo esc_url(get_post_meta(get_the_ID(), 'winter_teacher_twitter', true))?>"></a></li>
            <?php endif; ?>
          </ul>
        </div>

        <!-- -->
        <h3><?php the_title(); ?></h3>

        <!-- -->
        <?php the_excerpt(); ?>
      </div>
    </div>

    <?php endwhile; endif;?>

  </div>

</article>
<?php endwhile; endif; ?>
</section>
<?php get_footer() ?>