<?php 
/**
* Template name: Contact Template
*/
?>

<?php get_header() ?>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article class="contacts">
  <div class="info-line cf">
    <div class="map">
      <iframe
        src="https://maps.google.com/maps?q=google+map+new+york&amp;ie=UTF8&amp;hq=&amp;hnear=%D0%9D%D1%8C%D1%8E-%D0%99%D0%BE%D1%80%D0%BA,+%D0%A1%D0%BE%D0%B5%D0%B4%D0%B8%D0%BD%D0%B5%D0%BD%D0%BD%D1%8B%D0%B5+%D0%A8%D1%82%D0%B0%D1%82%D1%8B+%D0%90%D0%BC%D0%B5%D1%80%D0%B8%D0%BA%D0%B8&amp;gl=md&amp;t=m&amp;z=10&amp;ll=40.714353,-74.005973&amp;output=embed"></iframe><br />
    </div>

    <?php the_content()?>

    <div class="contactos">
      <?php if(!empty(get_post_meta(get_the_ID(), 'winter_contact_address', true))){ ?>
      <div class="adress">
        <div class="icon"></div>
        <h3>Address</h3>
        <p><?php echo esc_html_e(get_post_meta(get_the_ID(), 'winter_contact_address', true)); ?></p>
      </div>
      <?php }?>

      <?php if(!empty(get_post_meta(get_the_ID(), 'winter_contact_phone', true))){ ?>
      <div class="phone">
        <div class="icon"></div>
        <h3>Phone</h3>
        <p><?php echo esc_html_e(get_post_meta(get_the_ID(), 'winter_contact_phone', true)); ?></p>
      </div>
      <?php }?>

      <?php if(!empty(get_post_meta(get_the_ID(), 'winter_contact_email', true))){ ?>
      <div class="email">
        <div class="icon"></div>
        <h3>Email</h3>
        <p><?php echo esc_html_e(get_post_meta(get_the_ID(), 'winter_contact_email', true)); ?></p>
      </div>
      <?php }?>
    </div>
  </div>

  <!-- -->


  <?php if(get_post_meta(get_the_ID(), 'winter_contact_form_shortcode', true)): ?>


  <div class="respond">
    <div class="top">
      <h2>Get in touch with us</h2>
    </div>


    <form class="cf" method="post" id="respond-form">
      <?php echo do_shortcode(get_post_meta(get_the_ID(), 'winter_contact_form_shortcode', true));?>
    </form>
  </div>

  <?php endif; ?>

</article>


<?php endwhile;  endif;  ?>


</section>
<?php get_footer() ?>