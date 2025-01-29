<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="nl" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="nl" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="nl" class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html lang="nl" class="no-js ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html lang="nl" class="no-js"> <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <!-- <link rel="dns-prefetch" href="//use.typekit.com" /> -->
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <meta name="apple-mobile-web-app-capable" content="no" />
  <meta name="msapplication-tap-highlight" content="no" />

  <?php if ($page->title() == 'Home'): ?>
    <title><?php echo $site->title()->html() ?></title>
  <?php else: ?>
    <title><?php echo $site->title()->html() ?> &ndash; <?php echo $page->title()->html() ?></title>
  <?php endif; ?>

  <meta name="description" content="<?= $site->description() ?>">

  <!-- favicon -->
  <link rel="shortcut icon" sizes="16x16 24x24 32x32 48x48 64x64" href="<?= $site->url() ?>/assets/images/favicon.ico">

  <!-- twitter -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= $page->title() ?> - <?= $site->title()->html() ?>">
  <meta name="twitter:description" content="<?= (!$page->text()->empty()) ? $page->text()->excerpt() : $site->description()->html() ?>">
  <?php if ($page->hasImages()): ?>
    <meta name="twitter:image:src" content="<?= $page->images()->first()->crop(1024, 512) ?>">
  <?php else: ?>
    <meta name="twitter:image:src" content="<?= $site->url() ?>/assets/images/og.png">
  <?php endif; ?>

  <!-- facebook -->
  <meta property="og:url" content="<?= $site->url() ?>">
  <meta property="og:type" content="website">
  <?php if ($page->title() == 'Home'): ?>
    <meta property="og:title" content="<?= $site->title()->html() ?>">
  <?php else: ?>
    <meta property="og:title" content="<?= $page->title()->html() ?>">
  <?php endif; ?>
  <meta property="og:title" content="<?= $page->title()->html() ?>">
  <?php if ($page->hasImages()): ?>
    <meta name="og:image" content="<?= $page->images()->first()->crop(1200, 600) ?>">
  <?php else: ?>
    <meta name="og:image" content="<?= $site->url() ?>/assets/images/og.png">
  <?php endif; ?>
  <meta property="og:description" content="<?= (!$page->text()->empty()) ? $page->text()->excerpt() : $site->description()->html() ?>">
  <meta property="og:site_name" content="<?= $site->title()->html() ?>">
  <meta property="fb:app_id" content="242823952769889" />


  <!-- google og -->
  <meta itemprop="name" content="<?= $site->title()->html() ?>">
  <meta itemprop="description" content="<?= (!$page->text()->empty()) ? $page->text()->excerpt() : $site->description()->html() ?>">
  <?php if ($page->hasImages()): ?>
    <meta itemprop="image" content="<?= $page->images()->first()->crop(1200, 600) ?>">
  <?php else: ?>
    <meta itemprop="image" content="<?= $site->url() ?>/assets/images/og.png">
  <?php endif; ?>

  <?= css('assets/stylesheets/application.css') ?>

</head>

<body>

  <?php if ($page->intendedTemplate() == 'project'): ?>
    <!--googleoff: index-->
  <?php endif; ?>

  <section class="biography">
    <?php snippet('menu', array('color' => 'white')) ?>

    <div class="biography-content">
      <div class="grid">

        <div class="col-1-1 biography-intro">
          <?= $site->bio()->kt() ?>
        </div>

        <div class="biography-external-wrapper">
          <?php foreach ($site->extern()->toStructure() as $external): ?>
            <div class="col-1-1 col-md-1-2 biography-external">
              <h4><?= $external->title()->html() ?></h4>

              <?= $external->text()->kt() ?>
            </div>
          <?php endforeach; ?>
        </div>

        <footer class="footer">
          <div class="footer-links">
            <?php if ($site->email()->isNotEmpty()): ?>
              <a class="footer-links-link footer-links-link--email footer-links-link--email__white" href="mailto:<?= $site->email() ?>"></a>
            <?php endif; ?>
            <?php if ($site->facebook()->isNotEmpty()): ?>
              <a class="footer-links-link footer-links-link--facebook footer-links-link--facebook__white" href="<?= $site->facebook() ?>"></a>
            <?php endif; ?>
            <?php if ($site->linkedin()->isNotEmpty()): ?>
              <a class="footer-links-link footer-links-link--linkedin footer-links-link--linkedin__white" href="<?= $site->linkedin() ?>"></a>
            <?php endif; ?>
            <?php if ($site->twitter()->isNotEmpty()): ?>
              <a class="footer-links-link footer-links-link--twitter footer-links-link--twitter__white" href="<?= $site->twitter() ?>"></a>
            <?php endif; ?>
            <?php if ($site->tumblr()->isNotEmpty()): ?>
              <a class="footer-links-link footer-links-link--tumblr footer-links-link--tumblr__white" href="<?= $site->tumblr() ?>"></a>
            <?php endif; ?>
            <?php if ($site->snapchat()->isNotEmpty()): ?>
              <a class="footer-links-link footer-links-link--instagram footer-links-link--instagram__white" href="https://instagram.com/<?= $site->snapchat() ?>"></a>
            <?php endif; ?>
            <?php if ($site->vimeo()->isNotEmpty()): ?>
              <a class="footer-links-link footer-links-link--vimeo footer-links-link--vimeo__white" href="<?= $site->vimeo() ?>"></a>
            <?php endif; ?>
          </div>
          <p>
            <small>Design: <a href="http://www.vanlennep.eu" target="_blank">Van Lennep</a></small>
          </p>
        </footer>

      </div>
    </div>
  </section>

  <?php if ($page->intendedTemplate() == 'project'): ?>
    <!--googleon: index-->
  <?php endif; ?>

  <?php snippet('menu', array('color' => 'white')) ?>

  <header class="header header--intro" xxx<?= ($site->picture()->isNotEmpty()) ? 'data-bg="' . $site->picture()->toFile()->url() . '"' : '' ?>>

    <div class="header-type">
      Sport &amp; Creatie
    </div>

    <?php if ($site->picture_video()->isNotEmpty()): ?>
      <video src="<?= $site->picture_video()->toFile()->url() ?>" loop buffer autoplay muted playsinline></video>
    <?php endif; ?>

  </header>