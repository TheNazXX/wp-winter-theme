<article <?php post_class();?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
  <h2 class="display-4 text-uppercase text-center mb-5"><?php the_title()?></h2>
  <?php the_content()?>
</article>