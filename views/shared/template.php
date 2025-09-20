<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <?php $title = 'Page Title' . ($name ? ' - ' . $name : '') ?>
    <title><?= $this->e($title) ?></title>
</head>

<body>
    <?= $this->section('content') ?>
    <?= $this->section('scripts') ?>
</body>

</html>
