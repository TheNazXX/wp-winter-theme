<?php get_header() ?>

<div class="container">
  <div class="row">
      <?php while (have_posts()) : the_post(); ?>
        <div class="col-md-12">
          <div class="card">
          <?php if(has_post_thumbnail()): ?>
            <?php the_post_thumbnail('medium')?>
            <?php else: ?>
              <img class="post-img" src="https://picsum.photos/350/350" alt="random-img">
            <?php endif;?>
            <div class="card-body">
              <h1 class="card-title">
                <?php the_title()?>
              </h1>
              <p class="card-text"><?php the_content()?></p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
  </div>
</div>

<?php get_footer() ?>