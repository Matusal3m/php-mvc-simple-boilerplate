<?php

/** @var mixed $this */
/** @var string $label */
/** @var string $name */
/** @var array $options */
/** @var string|null $selected */
/** @var string|null $placeholder */
/** @var bool|null $required */
/** @var string $ring */
?>

<div>
  <label class="block text-sm font-medium text-gray-700 mb-1"><?= $this->e($label) ?></label>
  <select
    name="<?= $this->e($name) ?>"
    class="w-full border border-gray-300 rounded-xl p-3 focus:outline-none focus:ring-2 focus:ring-[<?= $this->e($ring) ?>] focus:border-transparent transition-colors duration-200">
    <?= !empty($required) ? 'required' : '' ?>>
    <?php if (isset($placeholder)): ?>
      <option
        value="__placeholder__"
        selected>
        <?= $this->e($placeholder) ?>
      </option>
    <?php endif; ?>

    <?php foreach ($options as $value => $text): ?>
      <option
        value="<?= $this->e($value) ?>"
        <?= $value === ($selected ?? '') ? 'selected' : '' ?>>
        <?= $this->e($text) ?>
      </option>
    <?php endforeach; ?>

  </select>
</div>
