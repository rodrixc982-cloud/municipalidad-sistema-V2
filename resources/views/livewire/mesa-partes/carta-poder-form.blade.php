<div class="max-w-2xl">
    <div class="bg-white border border-[#EDEAE2] rounded-xl p-6">
        <h2 class="text-[16px] font-semibold text-[#1C1B19] mb-1">Generar carta poder</h2>
        <p class="text-[13.5px] text-[#6B6862] mb-6">Completa los datos y descarga el documento en PDF, listo para firmar.</p>

        <form action="{{ route('documentos.carta-poder') }}" method="POST" target="_blank" class="space-y-4">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Nombre del poderdante</label>
                    <input type="text" name="poderdante" required class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Documento del poderdante</label>
                    <input type="text" name="poderdante_documento" required class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Nombre del apoderado</label>
                    <input type="text" name="apoderado" required class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                </div>
                <div>
                    <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Documento del apoderado</label>
                    <input type="text" name="apoderado_documento" required class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]" />
                </div>
            </div>

            <div>
                <label class="block text-[13px] font-medium text-[#3D3B36] mb-1.5">Trámite o motivo del poder</label>
                <textarea name="motivo" rows="4" required placeholder="Ej: Para que realice en mi representación el trámite de licencia de funcionamiento ante la Municipalidad…"
                          class="w-full rounded-lg border border-[#E3E0D9] px-3.5 py-2.5 text-[14px]"></textarea>
            </div>

            <div class="flex justify-end pt-3 border-t border-[#EDEAE2]">
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-[#7A1F2B] hover:bg-[#671A24] text-white text-[13.5px] font-medium transition">
                    Generar PDF
                </button>
            </div>
        </form>
    </div>
</div>
