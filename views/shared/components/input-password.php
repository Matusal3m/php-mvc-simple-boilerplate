<?php

/** @var string $label */
/** @var string $name */
/** @var string $value */
/** @var string $ring */
?>

<div>
  <label class="block text-sm font-medium text-gray-700 mb-1"><?= $this->e($label) ?></label>
  <input
    :type="showPassword ? 'text' : 'password'"
    name="<?= $this->e($name) ?>"
    value="<?= $this->e($value ?? '') ?>"
    minlength="6"
    class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:ring-2 focus:outline-none focus:ring-[<?= $this->e($ring) ?>]"
    required>
</div>