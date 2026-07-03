<button
    wire:click="logout"
    wire:confirm="¿Seguro que deseas cerrar sesión?"
    class="w-full flex items-center gap-2.5 px-3 py-2 rounded-lg text-[13.5px] text-[#6B6862] hover:bg-[#F2EFE8] hover:text-[#1C1B19] transition"
>
    <svg viewBox="0 0 24 24" class="w-[17px] h-[17px]" fill="none" stroke="currentColor" stroke-width="1.7">
        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4M16 17l5-5-5-5M21 12H9" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    Cerrar sesión
</button>
<?php /**PATH C:\laragon\www\municipalidad-sistema V2\resources\views/livewire/auth/logout.blade.php ENDPATH**/ ?>