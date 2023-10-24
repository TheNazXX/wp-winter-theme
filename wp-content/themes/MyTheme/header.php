<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head() ?>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo home_url() ?>"><?php echo bloginfo('name') ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php wp_nav_menu([
        'theme_location' => 'header_menu',
        'container_class' => 'collapse navbar-collapse',
        'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
        'walker' => new wp1_Menu
      ]) ?>

    </div>
  </nav>