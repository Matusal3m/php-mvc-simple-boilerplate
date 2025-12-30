<?php 

/**
 * 
 * @var mixed $this      
 * @var string $pageName 
 * */

$pageName ??= null;
$title = 'Rufi' . ($pageName ? ' - ' . $pageName : '');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->e($title)?></title>
</head>

<body class="antialiased text-slate-900 bg-slate-50 min-h-screen">
    <?=$this->section('content')?>
    <?=$this->section('scripts')?>
</body>

</html>
