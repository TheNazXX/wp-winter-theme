<?php get_header() ?>

<div class="container">
  <div class="row">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
             <h5 class="card-title">
                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
              </h5>
              
            </div>


            <div class="card-body">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium', ['class' => 'float-left']) ?>
              <?php else : ?>
                <img class="post-img float-left" src="https://picsum.photos/200" alt="random-img">
              <?php endif; ?>
              <p class="card-text"><?php the_excerpt() ?></p>
            </div>

            <div class="card-footer">
            <a href="<?php the_permalink() ?>" class="btn btn-primary">Go to post</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
      <?php the_posts_pagination([
        'mid_size' => 2,
        'type' => 'list'
      ])?>
    <?php else : ?>
      <p>Don't have posts</p>
    <?php endif; ?>
  </div>
</div>

<?php get_footer() ?>