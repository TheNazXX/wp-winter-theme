<?php get_header()?>


<div class="container-fluid py-5">
  <div class="container pt-5 pb-3">
    <?php 
      while(have_posts()):
        the_post();
        get_template_part('partials/content', 'page');

        if(comments_open() || get_comments_number()):
          comments_template();
        endif;

      endwhile;
    ?>
  </div>
</div>


<?php get_footer()?>