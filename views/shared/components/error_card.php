<div class="bg-red-50 border border-red-400 text-red-800 px-4 py-3 rounded-xl mb-4 shadow-sm flex items-center gap-3">
    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M12 3C7.031 3 3 7.031 3 12s4.031 9 9 9 9-4.031 9-9-4.031-9-9-9z">
        </path>
    </svg>

    <span class="text-sm font-medium"><?= $this->e($errorMessage ?? "Erro ao validar os dados") ?></span>
</div>
