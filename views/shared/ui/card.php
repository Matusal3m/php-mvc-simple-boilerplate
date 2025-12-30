<?php

/**
 * @var string $title
 * @var string $subtitle
 * @var string $body
 * @var array $actions
 */
?>
<article class="bg-white rounded-lg shadow p-4">
    <?php if (! empty($title)): ?>
        <h3 class="font-semibold mb-1"><?php echo $this->e($title) ?></h3>
    <?php endif; ?>
    <?php if (! empty($subtitle)): ?>
        <div class="text-sm text-slate-500 mb-2"><?php echo $this->e($subtitle) ?></div>
    <?php endif; ?>


    <div class="text-sm text-slate-700 mb-3"><?php echo $body ?? '' ?></div>


    <?php if (! empty($actions) && is_array($actions)): ?>
        <div class="flex gap-2">
            <?php foreach ($actions as $a): ?>
                <a href="<?= $this->e($a['href'] ?? '#') ?>" class="px-3 py-1 rounded bg-slate-100 hover:bg-slate-200 text-sm"><?php echo $this->e($a['label'] ?? 'Ação') ?></a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</article>