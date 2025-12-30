<?php

use League\Plates\Engine;

$templates = new Engine();

$templates->registerFunction('formatDate', function ($date) {
    return date_format(new DateTime($date), 'd/m/Y \à\s H:i');
});

$templates->addFolder('pages', __DIR__ . '/../views/pages');

$templates->addFolder('ui', __DIR__ . '/../views/shared/ui');
$templates->addFolder('layouts', __DIR__ . '/../views/shared/layouts');

return $templates;
