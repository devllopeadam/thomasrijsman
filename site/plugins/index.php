<?php

// import App class
use Kirby\Cms\App as Kirby;

Kirby::plugin('cookbook/file-component', [
  'components' => [
    'file::url' => function (Kirby $kirby, $file) {
      // serve videos from content folder
      if ($file->type() === 'video') {
        return $kirby->url() . '/content/' . $file->parent()->diruri() . '/' . $file->filename();
        // while all other files are served from the media folder
      } else {
        return $file->mediaUrl();
      }
    },
  ]
]);
