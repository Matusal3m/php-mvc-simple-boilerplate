<?php

/**
 *
 * @var mixed $this
 * @var string $text
 * @var string $color
 * @var string $type
 * @var string $textColor
 * @var string $classes
 * */

?>

<button type="<?= $this->e($type ?? 'submit') ?>" class="cursor-pointer w-full bg-[<?= $this->e($color ?? 'white') ?>] text-[<?= $this->e($textColor ?? 'white') ?>] py-3 rounded-xl font-semibold hover:opacity-90 transition duration-300 <?= $this->e($classes)?>">
  <?= $this->e($text) ?>
</button>
