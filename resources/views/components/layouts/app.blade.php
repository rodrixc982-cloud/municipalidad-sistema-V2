<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Dashboard' }} · Sistema Municipal</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans antialiased bg-[#F4F2EE] text-[#1C1B19]">
<div class="flex h-screen overflow-hidden">

    {{-- SIDEBAR --}}
    <aside class="w-64 flex-shrink-0 bg-[#18181B] flex flex-col">

        {{-- Logo --}}
        <div class="h-16 flex items-center gap-3 px-5 border-b border-white/[0.06]">
            <div class="w-8 h-8 rounded-lg bg-[#7A1F2B] flex items-center justify-center flex-shrink-0 shadow-lg">
                <svg viewBox="0 0 24 24" class="w-4.5 h-4.5 text-white" fill="none" stroke="currentColor" stroke-width="1.8">
                    <path d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div>
                <p class="text-white text-[13px] font-semibold leading-none">Municipalidad</p>
                <p class="text-white/40 text-[10px] mt-0.5">Sistema de Gestión</p>
            </div>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-5">

            <div>
                <p class="px-3 mb-1.5 text-[10px] uppercase tracking-[0.15em] text-white/30 font-semibold">Principal</p>
                <a href="{{ route('dashboard') }}" wire:navigate
                   class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-[13px] font-medium transition-all {{ request()->routeIs('dashboard') ? 'bg-[#7A1F2B] text-white shadow-lg shadow-[#7A1F2B]/30' : 'text-white/55 hover:bg-white/[0.06] hover:text-white' }}">
                    <svg viewBox="0 0 24 24" class="w-[17px] h-[17px] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8">
                        <rect x="3" y="3" width="7" height="9" rx="1.5"/><rect x="14" y="3" width="7" height="5" rx="1.5"/>
                        <rect x="14" y="12" width="7" height="9" rx="1.5"/><rect x="3" y="16" width="7" height="5" rx="1.5"/>
                    </svg>
                    Dashboard
                </a>
            </div>

            <div>
                <p class="px-3 mb-1.5 text-[10px] uppercase tracking-[0.15em] text-white/30 font-semibold">Trámites</p>
                @php
                    function navLink($route, $icon, $label, $active) {
                        $cls = $active
                            ? 'bg-white/[0.1] text-white'
                            : 'text-white/55 hover:bg-white/[0.06] hover:text-white';
                        return "<a href=\"" . route($route) . "\" wire:navigate class=\"flex items-center gap-2.5 px-3 py-2 rounded-xl text-[13px] font-medium transition-all {$cls}\">{$icon}{$label}</a>";
                    }
                @endphp
                <a href="{{ route('expedientes.index') }}" wire:navigate
                   class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-[13px] font-medium transition-all {{ request()->routeIs('expedientes.*','carta-poder.*') ? 'bg-white/[0.1] text-white' : 'text-white/55 hover:bg-white/[0.06] hover:text-white' }}">
                    <svg viewBox="0 0 24 24" class="w-[17px] h-[17px] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" stroke-linejoin="round"/><path d="M14 2v6h6M9 13h6M9 17h4" stroke-linecap="round"/></svg>
                    Mesa de Partes
                </a>
                <a href="{{ route('documentos.editor') }}" wire:navigate
                   class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-[13px] font-medium transition-all {{ request()->routeIs('documentos.*') ? 'bg-white/[0.1] text-white' : 'text-white/55 hover:bg-white/[0.06] hover:text-white' }}">
                    <svg viewBox="0 0 24 24" class="w-[17px] h-[17px] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke-linejoin="round"/></svg>
                    Editor de documentos
                </a>
            </div>

            <div>
                <p class="px-3 mb-1.5 text-[10px] uppercase tracking-[0.15em] text-white/30 font-semibold">Rentas</p>
                <a href="{{ route('predios.index') }}" wire:navigate
                   class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-[13px] font-medium transition-all {{ request()->routeIs('predios.*') ? 'bg-white/[0.1] text-white' : 'text-white/55 hover:bg-white/[0.06] hover:text-white' }}">
                    <svg viewBox="0 0 24 24" class="w-[17px] h-[17px] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 9.5 12 3l9 6.5V20a1 1 0 0 1-1 1h-5v-7H9v7H4a1 1 0 0 1-1-1z" stroke-linejoin="round"/></svg>
                    Predios / Autovalúo
                </a>
                <a href="{{ route('licencias.index') }}" wire:navigate
                   class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-[13px] font-medium transition-all {{ request()->routeIs('licencias.*') ? 'bg-white/[0.1] text-white' : 'text-white/55 hover:bg-white/[0.06] hover:text-white' }}">
                    <svg viewBox="0 0 24 24" class="w-[17px] h-[17px] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" stroke-linecap="round"/><path d="M12 12v3M10.5 13.5h3" stroke-linecap="round"/></svg>
                    Licencias
                </a>
                <a href="{{ route('caja.index') }}" wire:navigate
                   class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-[13px] font-medium transition-all {{ request()->routeIs('caja.*') || request()->routeIs('pagos.index') ? 'bg-white/[0.1] text-white' : 'text-white/55 hover:bg-white/[0.06] hover:text-white' }}">
                    <svg viewBox="0 0 24 24" class="w-[17px] h-[17px] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 8h20v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V8z"/><path d="M2 8l2-4h16l2 4"/><path d="M9 14h6" stroke-linecap="round"/></svg>
                    Caja / Recaudación
                </a>
            </div>

            <div>
                <p class="px-3 mb-1.5 text-[10px] uppercase tracking-[0.15em] text-white/30 font-semibold">Administración</p>
                <a href="{{ route('empleados.index') }}" wire:navigate
                   class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-[13px] font-medium transition-all {{ request()->routeIs('empleados.*') ? 'bg-white/[0.1] text-white' : 'text-white/55 hover:bg-white/[0.06] hover:text-white' }}">
                    <svg viewBox="0 0 24 24" class="w-[17px] h-[17px] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke-linecap="round"/></svg>
                    RRHH / Planillas
                </a>
                <a href="{{ route('admin.usuarios') }}" wire:navigate
                   class="flex items-center gap-2.5 px-3 py-2 rounded-xl text-[13px] font-medium transition-all {{ request()->routeIs('admin.*') ? 'bg-white/[0.1] text-white' : 'text-white/55 hover:bg-white/[0.06] hover:text-white' }}">
                    <svg viewBox="0 0 24 24" class="w-[17px] h-[17px] flex-shrink-0" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/><path d="M16 3.13a4 4 0 0 1 0 7.75" stroke-linecap="round"/><circle cx="20" cy="18" r="3" fill="none"/><path d="M20 16.5v1.5l1 1" stroke-linecap="round"/></svg>
                    Usuarios y roles
                </a>
            </div>
        </nav>

        {{-- Usuario en el fondo --}}
        <div class="border-t border-white/[0.06] p-3">
            <a href="{{ route('admin.perfil') }}" wire:navigate
               class="flex items-center gap-2.5 px-2.5 py-2 rounded-xl hover:bg-white/[0.06] transition group mb-1">
                @if(auth()->user()->foto_perfil)
                    <img src="{{ Storage::url(auth()->user()->foto_perfil) }}"
                         class="w-8 h-8 rounded-full object-cover ring-2 ring-white/10 flex-shrink-0"/>
                @else
                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#7A1F2B] to-[#9B2635] flex items-center justify-center text-white text-[11px] font-bold flex-shrink-0 ring-2 ring-white/10">
                        {{ auth()->user()->iniciales }}
                    </div>
                @endif
                <div class="min-w-0 flex-1">
                    <p class="text-[12.5px] font-medium text-white truncate leading-none">{{ auth()->user()->name }}</p>
                    <p class="text-[11px] text-white/35 truncate leading-none mt-0.5">{{ auth()->user()->area ?? 'Sin área' }}</p>
                </div>
                <svg viewBox="0 0 24 24" class="w-3.5 h-3.5 text-white/30 flex-shrink-0 opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6" stroke-linecap="round"/></svg>
            </a>
            @livewire('auth.logout')
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-14 flex-shrink-0 flex items-center justify-between px-8 bg-white border-b border-[#EDEAE2] shadow-sm">
            <div>
                <h1 class="text-[15px] font-semibold text-[#1C1B19]">{{ $title ?? 'Dashboard' }}</h1>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-[12.5px] text-[#A8A498]">{{ now()->translatedFormat('d \d\e F, Y') }}</span>
                <div class="w-px h-4 bg-[#EDEAE2]"></div>
                <a href="{{ route('admin.perfil') }}" wire:navigate class="flex items-center gap-2 group">
                    @if(auth()->user()->foto_perfil)
                        <img src="{{ Storage::url(auth()->user()->foto_perfil) }}"
                             class="w-7 h-7 rounded-full object-cover ring-2 ring-[#EDEAE2] group-hover:ring-[#7A1F2B]/40 transition"/>
                    @else
                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-[#7A1F2B] to-[#9B2635] flex items-center justify-center text-white text-[10px] font-bold ring-2 ring-[#EDEAE2]">
                            {{ auth()->user()->iniciales }}
                        </div>
                    @endif
                    <span class="text-[12.5px] text-[#6B6862] group-hover:text-[#1C1B19] transition">Mi perfil</span>
                </a>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-7">
            {{ $slot }}
        </main>
    </div>
</div>

@livewireScripts
</body>
</html>
