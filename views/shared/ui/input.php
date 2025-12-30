<?php

/** @var string $label */
/** @var string $type */
/** @var string $name */
/** @var string $value */
/** @var string|null $placeholder */
/** @var bool $required */
/** @var string|null $classes */
?>

<div>
  <label class="block text-sm font-medium text-gray-700 mb-1"><?= $this->e($label) ?></label>
  <input
    type="<?= $this->e($type) ?>"
    name="<?= $this->e($name) ?>"
    value="<?= $this->e($value ?? '') ?>"
    placeholder="<?= $this->e($placeholder ?? '') ?>"
    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:outline-none <?= $this->e($classes ?? '') ?>"
    <?= !empty($required) ? 'required' : '' ?>>
</div>