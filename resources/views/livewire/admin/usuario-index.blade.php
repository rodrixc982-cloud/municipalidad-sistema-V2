<div>
    @if (session('status'))
        <div class="mb-5 rounded-xl bg-emerald-50 border border-emerald-200 px-4 py-3 text-[13.5px] text-emerald-700 flex items-center gap-2">
            <svg viewBox="0 0 24 24" class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6 9 17l-5-5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            {{ session('status') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <div class="relative flex-1 max-w-sm">
            <svg viewBox="0 0 24 24" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-[#A8A498]" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35" stroke-linecap="round"/></svg>
            <input type="text" wire:model.live.debounce.300ms="busqueda" placeholder="Buscar usuario…"
                   class="w-full pl-9 pr-4 py-2.5 rounded-xl border border-[#E3E0D9] bg-white text-[13.5px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]"/>
        </div>
        <button wire:click="abrirCrear"
                class="ml-4 flex items-center gap-2 bg-[#7A1F2B] hover:bg-[#671A24] text-white text-[13.5px] font-medium px-4 py-2.5 rounded-xl transition">
            <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 5v14M5 12h14" stroke-linecap="round"/></svg>
            Nuevo usuario
        </button>
    </div>

    <div class="bg-white border border-[#EDEAE2] rounded-2xl overflow-hidden shadow-sm">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b border-[#EDEAE2] bg-[#FAFAF8]">
                    <th class="px-5 py-3.5 text-[11.5px] font-semibold uppercase tracking-wider text-[#A8A498]">Usuario</th>
                    <th class="px-5 py-3.5 text-[11.5px] font-semibold uppercase tracking-wider text-[#A8A498]">Área</th>
                    <th class="px-5 py-3.5 text-[11.5px] font-semibold uppercase tracking-wider text-[#A8A498]">Rol</th>
                    <th class="px-5 py-3.5 text-[11.5px] font-semibold uppercase tracking-wider text-[#A8A498]">Estado</th>
                    <th class="px-5 py-3.5"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#F2EFE8]">
                @forelse ($usuarios as $usuario)
                    <tr class="hover:bg-[#FAFAF8] transition group">
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-3">
                                @if ($usuario->foto_perfil)
                                    <img src="{{ Storage::url($usuario->foto_perfil) }}" alt="{{ $usuario->name }}"
                                         class="w-9 h-9 rounded-full object-cover ring-2 ring-[#EDEAE2]"/>
                                @else
                                    <div class="w-9 h-9 rounded-full bg-[#7A1F2B] flex items-center justify-center text-white text-[12px] font-semibold ring-2 ring-[#EDEAE2]">
                                        {{ $usuario->iniciales }}
                                    </div>
                                @endif
                                <div>
                                    <p class="text-[13.5px] font-medium text-[#1C1B19]">{{ $usuario->name }}</p>
                                    <p class="text-[12px] text-[#A8A498]">{{ $usuario->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 text-[13.5px] text-[#6B6862]">{{ $usuario->area ?? '—' }}</td>
                        <td class="px-5 py-4">
                            <span class="text-[11.5px] px-2.5 py-1 rounded-full font-medium bg-[#F2EFE8] text-[#7A1F2B]">
                                {{ $usuario->roles->first()?->name ?? '—' }}
                            </span>
                        </td>
                        <td class="px-5 py-4">
                            <span class="inline-flex items-center gap-1.5 text-[12px] font-medium {{ $usuario->activo ? 'text-emerald-700' : 'text-red-600' }}">
                                <span class="w-1.5 h-1.5 rounded-full {{ $usuario->activo ? 'bg-emerald-500' : 'bg-red-500' }}"></span>
                                {{ $usuario->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-right">
                            <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition">
                                <button wire:click="abrirEditar({{ $usuario->id }})"
                                        class="p-1.5 rounded-lg hover:bg-[#F2EFE8] text-[#6B6862] hover:text-[#1C1B19] transition">
                                    <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" stroke-linejoin="round"/></svg>
                                </button>
                                @if ($usuario->id !== auth()->id())
                                    <button wire:click="confirmarEliminar({{ $usuario->id }})"
                                            class="p-1.5 rounded-lg hover:bg-red-50 text-[#A8A498] hover:text-red-600 transition">
                                        <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-5 py-12 text-center text-[13.5px] text-[#A8A498]">No hay usuarios registrados.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $usuarios->links() }}</div>

    {{-- Modal Crear/Editar --}}
    @if ($modalAbierto)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" x-data>
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" wire:click="$set('modalAbierto', false)"></div>
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-[#EDEAE2]">
                    <h3 class="text-[15px] font-semibold text-[#1C1B19]">{{ $esEdicion ? 'Editar usuario' : 'Nuevo usuario' }}</h3>
                    <button wire:click="$set('modalAbierto', false)" class="p-1.5 rounded-lg hover:bg-[#F2EFE8] text-[#A8A498] transition">
                        <svg viewBox="0 0 24 24" class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12" stroke-linecap="round"/></svg>
                    </button>
                </div>

                <div class="p-6 space-y-4 max-h-[70vh] overflow-y-auto">
                    {{-- Foto de perfil --}}
                    <div class="flex items-center gap-4 pb-4 border-b border-[#F2EFE8]">
                        <div class="relative">
                            @if ($foto)
                                <img src="{{ $foto->temporaryUrl() }}" class="w-16 h-16 rounded-full object-cover ring-2 ring-[#7A1F2B]/20"/>
                            @elseif ($esEdicion && ($u = App\Models\User::find($usuarioId)) && $u->foto_perfil)
                                <img src="{{ Storage::url($u->foto_perfil) }}" class="w-16 h-16 rounded-full object-cover ring-2 ring-[#7A1F2B]/20"/>
                            @else
                                <div class="w-16 h-16 rounded-full bg-[#F2EFE8] flex items-center justify-center text-[#7A1F2B] text-xl font-bold">
                                    {{ $name ? strtoupper(substr($name, 0, 2)) : '?' }}
                                </div>
                            @endif
                        </div>
                        <div>
                            <label class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-lg border border-[#E3E0D9] text-[13px] font-medium text-[#3D3B36] hover:bg-[#F2EFE8] transition">
                                <svg viewBox="0 0 24 24" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                Subir foto
                                <input type="file" wire:model="foto" accept="image/*" class="hidden"/>
                            </label>
                            <p class="text-[11.5px] text-[#A8A498] mt-1">JPG, PNG. Máx 2 MB</p>
                        </div>
                        @error('foto') <p class="text-[12px] text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1.5">Nombre completo</label>
                        <input type="text" wire:model.live="name" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]"/>
                        @error('name') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1.5">Correo electrónico</label>
                        <input type="email" wire:model="email" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]"/>
                        @error('email') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1.5">
                            Contraseña {{ $esEdicion ? '(dejar vacío para no cambiar)' : '' }}
                        </label>
                        <input type="password" wire:model="password" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]"/>
                        @error('password') <p class="text-[12px] text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1.5">Área</label>
                            <select wire:model="area" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[13.5px] bg-white focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]">
                                <option value="">Selecciona…</option>
                                @foreach ($areas as $a)
                                    <option value="{{ $a }}">{{ $a }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-[12.5px] font-medium text-[#3D3B36] mb-1.5">Rol</label>
                            <select wire:model="rol" class="w-full rounded-xl border border-[#E3E0D9] px-3.5 py-2.5 text-[13.5px] bg-white focus:outline-none focus:ring-2 focus:ring-[#7A1F2B]/20 focus:border-[#7A1F2B]">
                                @foreach ($roles as $r)
                                    <option value="{{ $r->name }}">{{ str($r->name)->replace('_', ' ')->title() }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <label class="flex items-center gap-2.5 cursor-pointer select-none">
                        <input type="checkbox" wire:model="activo" class="rounded border-[#D5D1C7] text-[#7A1F2B] focus:ring-[#7A1F2B]/30"/>
                        <span class="text-[13.5px] text-[#3D3B36]">Usuario activo</span>
                    </label>
                </div>

                <div class="flex justify-end gap-3 px-6 py-4 border-t border-[#EDEAE2] bg-[#FAFAF8]">
                    <button wire:click="$set('modalAbierto', false)" class="px-4 py-2.5 rounded-xl text-[13.5px] font-medium text-[#6B6862] hover:bg-[#EDEAE2] transition">Cancelar</button>
                    <button wire:click="guardar" wire:loading.attr="disabled"
                            class="px-5 py-2.5 rounded-xl bg-[#7A1F2B] hover:bg-[#671A24] disabled:opacity-60 text-white text-[13.5px] font-medium transition">
                        {{ $esEdicion ? 'Guardar cambios' : 'Crear usuario' }}
                    </button>
                </div>
            </div>
        </div>
    @endif

    {{-- Modal confirmar eliminación --}}
    @if ($modalEliminar)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" wire:click="$set('modalEliminar', false)"></div>
            <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-sm p-6 text-center">
                <div class="w-12 h-12 rounded-full bg-red-100 flex items-center justify-center mx-auto mb-4">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                </div>
                <h3 class="text-[15px] font-semibold text-[#1C1B19] mb-2">¿Eliminar usuario?</h3>
                <p class="text-[13.5px] text-[#6B6862] mb-6">Esta acción no se puede deshacer.</p>
                <div class="flex gap-3">
                    <button wire:click="$set('modalEliminar', false)" class="flex-1 px-4 py-2.5 rounded-xl border border-[#E3E0D9] text-[13.5px] font-medium text-[#6B6862] hover:bg-[#F2EFE8] transition">Cancelar</button>
                    <button wire:click="eliminar" class="flex-1 px-4 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-[13.5px] font-medium transition">Eliminar</button>
                </div>
            </div>
        </div>
    @endif
</div>
