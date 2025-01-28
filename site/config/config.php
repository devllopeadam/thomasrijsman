<?php

return [
  'license' => 'BETA9URWW',

  'debug' => true,
  'cache' => false,

  'panel' => true,

  'routes' => [
    [
      'pattern' => array('televisie', 'documentaire', 'auteur', 'over'),
      'action' => function ($path) {
        return site()->visit('');
      }
    ]
  ],
  'thumbs' => [
    'allowedExtensions' => ['png', 'gif', 'webp', 'jpg', 'jpeg']
  ]
  // 'cache' => [
  //   'pages' => [
  //     'active' => true,
  //   ],
  // ],
];
