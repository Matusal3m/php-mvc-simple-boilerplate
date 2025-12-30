<!DOCTYPE html>
<html lang="pt-br">

<?php 
    /**
     * @var \League\Plates\Template\Template $this
     * @var string $pageName
    * */

    $pageName ??= null;
    $title = 'Rufi' . ($pageName ? ' - ' . $pageName : '');
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->e($title)?></title>
</head>

<body class="antialiased text-slate-900 bg-slate-50 min-h-screen">
    <?php echo $this->section('content')?>
    <?php echo $this->section('scripts')?>
</body>

</html>
