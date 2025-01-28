<?php if (param('category')) {
  $projects = $projects->filterBy('category', param('category'));
} ?>

<?php foreach ($projects as $p) {
  snippet('blocks/project', array('project' => $p));
} ?>