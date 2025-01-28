<?php $active = ($_SERVER['REQUEST_URI'] == '/auteur' || $_SERVER['REQUEST_URI'] == '/documentaire' || $_SERVER['REQUEST_URI'] == '/televisie') ?>
<?php if ($inside): ?>
  <nav class="nav nav--projects nav--inside">
    <ul>
      <li data-filter="author" <?= ($inside == 'author') ? 'class="nav-inside"' : '' ?>><a href="/auteur">Auteur</a></li>
      <li data-filter="documentary" <?= ($inside == 'documentary') ? 'class="nav-inside"' : '' ?>><a href="/documentaire">Documentaire</a></li>
      <li data-filter="tv" <?= ($inside == 'tv') ? 'class="nav-inside"' : '' ?>><a href="/televisie">Televisie</a></li>
    </ul>
  </nav>
<?php else: ?>
  <nav class="nav nav--projects <?= ($active) ? 'nav--activated' : '' ?>">
    <ul>
      <li data-filter="author" <?= ($_SERVER['REQUEST_URI'] == '/auteur') ? 'class="nav-active"' : '' ?>><a href="/auteur">Auteur</a></li>
      <li data-filter="documentary" <?= ($_SERVER['REQUEST_URI'] == '/documentaire') ? 'class="nav-active"' : '' ?>><a href="/documentaire">Documentaire</a></li>
      <li data-filter="tv" <?= ($_SERVER['REQUEST_URI'] == '/televisie') ? 'class="nav-active"' : '' ?>><a href="/televisie">Televisie</a></li>
    </ul>
  </nav>
<?php endif; ?>