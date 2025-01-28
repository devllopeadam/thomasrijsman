<a class="projects-project <?= ($project->thumb()->isNotEmpty()) ? '' : ' projects-project--nopicture' ?> projects-project--<?= ($project->size()->empty()) ? 'small' : $project->size() ?> project--<?= $project->category() ?>" href="<?= $project->url() ?>">

  <div class="projects-project-content <?= 'colorize--' . $project->category() ?>">

    <?php if ($project->thumb()->isNotEmpty() && $project->thumb()->toFile()): ?>
      <!-- Using Kirby's crop() method for dynamic resizing -->
      <figure class="projects-project-image" data-bg="<?= $project->thumb()->toFile()->url() ?>">
        <!-- Optional: Add video if available -->
        <?php if ($project->thumb_vid()->isNotEmpty() && $project->thumb_vid()->toFile()): ?>
          <video src="<?= $project->thumb_vid()->toFile()->url() ?>" loop muted preload></video>
        <?php endif; ?>
      </figure>
    <?php endif; ?>

    <?php
    $categories = [
      'author' => 'Auteur',
      'tv' => 'Televisie',
      'documentary' => 'Documentaire'
    ];
    ?>

    <div class="projects-project-meta">
      <?php
      // Dynamically set category text
      $projectCategory = (string)$project->category();
      ?>
      <h6>
        <?= !empty($projectCategory) && isset($categories[$projectCategory])
          ? $categories[$projectCategory]
          : 'Uncategorized' ?>
      </h6>
      <h3><?= $project->title()->html() ?></h3>

      <!-- Optional subtitle -->
      <?php if ($project->subtitle()->isNotEmpty()): ?>
        <?= $project->subtitle()->kt() ?>
      <?php endif; ?>
    </div>

  </div>

</a>