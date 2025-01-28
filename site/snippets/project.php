<main class="project <?= 'colorize--' . $page->category() ?>" data-category="<?= $page->category() ?>">

  <header class="projects-header">
    <?php snippet('menu', array('color' => 'black')) ?>

    <?php snippet('project-nav', array('inside' => $page->category())) ?>
  </header>

  <?php if ($page->main_image()->isNotEmpty()): ?>
    <section class="project-picture">
      <div class="project-picture-inside">
        <?php foreach ($page->main_image()->toStructure() as $main): ?>

          <?php if ($main->_fieldset() == 'video'): ?>
            <?php if (strpos($main->video(), 'vimeo') !== false): ?>
              <?= str_replace('" frameborder', '?api=1" frameborder', vimeo($main->video())) ?>
            <?php endif; ?>

            <?php if (strpos($main->video(), 'youtu') !== false): ?>
              <?= youtube($main->video()) ?>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($main->_fieldset() == 'picture'): ?>
            <?= $main->picture()->toFile()->resize(1000) ?>
          <?php endif; ?>

        <?php endforeach; ?>
      </div>
    </section>
  <?php endif; ?>

  <?php if ($page->main_image()->toStructure()->count() > 1): ?>
    <section class="project-picture-nav">
      <?php foreach ($page->main_image()->toStructure() as $main): ?>
        <a class="project-picture-nav-item">
          <?php if ($main->_fieldset() == 'video'): ?>
            <?php if (strpos($main->video(), 'vimeo') !== false): ?>
              <?php $video = substr(parse_url($main->video(), PHP_URL_PATH), 1); ?>
              <?php $data = file_get_contents("http://vimeo.com/api/v2/video/" . $video . ".json");
              $data = json_decode($data);
              ?>
              <img src="<?= $data[0]->thumbnail_large ?>" alt="" />
            <?php endif; ?>

            <?php if (strpos($main->video(), 'youtu') !== false): ?>
              <?php $video = preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $main->video(), $matches); ?>
              <img src="http://img.youtube.com/vi/<?= $matches[0] ?>/mqdefault.jpg" />
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($main->_fieldset() == 'picture'): ?>
            <?= $main->picture()->toFile()->resize(200) ?>
          <?php endif; ?>
        </a>
      <?php endforeach; ?>
    </section>
  <?php endif; ?>

  <div class="grid">
    <section class="project-info col-1-1">
      <h3><?= $page->title()->html() ?></h3>

      <?php if ($page->text()->isNotEmpty()): ?>
        <?= $page->text()->kt() ?>
      <?php endif; ?>

      <!-- credits -->

      <?php if ($page->credits()->length()): ?>
        <ul class="project-info-credits">
          <?php foreach ($page->credits()->toStructure() as $credit): ?>
            <li><em><?= $credit->function()->html() ?></em> <span><?= $credit->name()->html() ?></span></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <?php if ($page->credits_alt()->length()): ?>
        <ul class="project-info-credits">
          <?php foreach ($page->credits_alt()->toStructure() as $credit): ?>
            <li><em><?= $credit->function()->html() ?></em> <span><?= $credit->name()->html() ?></span></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </section>

    <?php if ($page->assets()->length()): ?>
      <section class="project-assets">
        <?php foreach ($page->assets()->toStructure() as $asset): ?>

          <?php if ($asset->_fieldset() == 'video'): ?>
            <div class="project-assets-asset project-assets-asset--video">
              <?php if (strpos($asset->video(), 'vimeo') !== false): ?>
                <?= vimeo($asset->video()) ?>
              <?php endif; ?>

              <?php if (strpos($asset->video(), 'youtu') !== false): ?>
                <?= youtube($asset->video()) ?>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <?php if ($asset->_fieldset() == 'picture'): ?>
            <?php if ($asset->picture()->toFile()): ?>
              <div class="project-assets-asset project-assets-asset--picture">
                <?= $asset->picture()->toFile()->resize(1000) ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($asset->_fieldset() == 'pictures'): ?>
            <div class="project-assets-asset project-assets-asset--pictures">
              <?= $asset->picture_1()->toFile()->resize(1000) ?>
              <?= $asset->picture_2()->toFile()->resize(1000) ?>
            </div>
          <?php endif; ?>

        <?php endforeach; ?>
      </section>
    <?php endif; ?>
  </div>

  <!--googleoff: index-->
  <hr data-text="Overige projecten">
  <?php if ($page->category()->isNotEmpty()): ?>
    <div class="project-projects">
      <div class="grid fn-masonry">
        <?php $projects = $pages->find('projecten')->children()->filterBy('category', $page->category())->not($page->uid()) ?>
        <?php snippet('projects', array('projects' => $projects)) ?>
      </div>
    </div>
  <?php endif; ?>

  <footer class="footer">
    <div class="footer-links">
      <?php if ($site->email()->isNotEmpty()): ?>
        <a class="footer-links-link footer-links-link--email" href="mailto:<?= $site->email() ?>"></a>
      <?php endif; ?>
      <?php if ($site->facebook()->isNotEmpty()): ?>
        <a class="footer-links-link footer-links-link--facebook" href="<?= $site->facebook() ?>"></a>
      <?php endif; ?>
      <?php if ($site->linkedin()->isNotEmpty()): ?>
        <a class="footer-links-link footer-links-link--linkedin" href="<?= $site->linkedin() ?>"></a>
      <?php endif; ?>
      <?php if ($site->twitter()->isNotEmpty()): ?>
        <a class="footer-links-link footer-links-link--twitter" href="<?= $site->twitter() ?>"></a>
      <?php endif; ?>
      <?php if ($site->tumblr()->isNotEmpty()): ?>
        <a class="footer-links-link footer-links-link--tumblr" href="<?= $site->tumblr() ?>"></a>
      <?php endif; ?>
      <?php if ($site->snapchat()->isNotEmpty()): ?>
        <a class="footer-links-link footer-links-link--instagram" href="https://instagram.com/<?= $site->snapchat() ?>"></a>
      <?php endif; ?>
      <?php if ($site->vimeo()->isNotEmpty()): ?>
        <a class="footer-links-link footer-links-link--vimeo" href="<?= $site->vimeo() ?>"></a>
      <?php endif; ?>
    </div>
    <p>
      <small>Design: <a href="http://www.vanlennep.eu" target="_blank">Van Lennep</a></small>
    </p>
  </footer>
  <!--googleon: index-->

</main>