<?php get_header() ?>
<h1>Hello, world!</h1>

<div class="container">
  <div class="row">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <div class="col-md-12">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">
                <a href="<?php the_permalink()?>"><?php the_title()?></a>
              </h5>
              <p class="card-text"><?php the_content('<button>Next</button>')?></p>
              <a href="<?php the_permalink()?>" class="btn btn-primary">Go to post</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <p>Don't have posts</p>
    <?php endif; ?>
  </div>
</div>

<?php get_footer() ?>