<?php

use App\Http\Controllers\DocumentoPdfController;
use App\Livewire\Admin\MiPerfil;
use App\Livewire\Admin\UsuarioIndex;
use App\Livewire\Auth\Login;
use App\Livewire\Caja\CajaIndex;
use App\Livewire\Caja\PagoIndex;
use App\Livewire\Dashboard\Index as DashboardIndex;
use App\Livewire\Documentos\EditorDocumentos;
use App\Livewire\Licencias\LicenciaCreate;
use App\Livewire\Licencias\LicenciaIndex;
use App\Livewire\MesaPartes\CartaPoderForm;
use App\Livewire\MesaPartes\ExpedienteCreate;
use App\Livewire\MesaPartes\ExpedienteIndex;
use App\Livewire\MesaPartes\ExpedienteShow;
use App\Livewire\Predios\PredioCreate;
use App\Livewire\Predios\PredioIndex;
use App\Livewire\Predios\PredioShow;
use App\Livewire\Rrhh\EmpleadoCreate;
use App\Livewire\Rrhh\EmpleadoIndex;
use App\Livewire\Rrhh\EmpleadoShow;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route(auth()->check() ? 'dashboard' : 'login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', DashboardIndex::class)->name('dashboard');

    // Mesa de Partes
    Route::get('/expedientes',            ExpedienteIndex::class)->name('expedientes.index');
    Route::get('/expedientes/nuevo',      ExpedienteCreate::class)->name('expedientes.create');
    Route::get('/expedientes/{expediente}', ExpedienteShow::class)->name('expedientes.show');
    Route::get('/carta-poder',            CartaPoderForm::class)->name('carta-poder.form');

    // Editor de documentos
    Route::get('/documentos/editor',      EditorDocumentos::class)->name('documentos.editor');
    Route::post('/documentos/editor-pdf', [DocumentoPdfController::class, 'editorPdf'])->name('documentos.editor-pdf');

    // Predios
    Route::get('/predios',           PredioIndex::class)->name('predios.index');
    Route::get('/predios/nuevo',     PredioCreate::class)->name('predios.create');
    Route::get('/predios/{predio}',  PredioShow::class)->name('predios.show');

    // Licencias
    Route::get('/licencias',         LicenciaIndex::class)->name('licencias.index');
    Route::get('/licencias/nueva',   LicenciaCreate::class)->name('licencias.create');

    // Caja
    Route::get('/caja',   CajaIndex::class)->name('caja.index');
    Route::get('/pagos',  PagoIndex::class)->name('pagos.index');

    // RRHH
    Route::get('/empleados',              EmpleadoIndex::class)->name('empleados.index');
    Route::get('/empleados/nuevo',        EmpleadoCreate::class)->name('empleados.create');
    Route::get('/empleados/{empleado}',   EmpleadoShow::class)->name('empleados.show');

    // Admin
    Route::get('/admin/usuarios',         UsuarioIndex::class)->name('admin.usuarios');
    Route::get('/admin/perfil',           MiPerfil::class)->name('admin.perfil');

    // Edición de registros
    Route::get('/predios/{predio}/editar',    \App\Livewire\Predios\PredioEdit::class)->name('predios.edit');
    Route::get('/empleados/{empleado}/editar',\App\Livewire\Rrhh\EmpleadoEdit::class)->name('empleados.edit');

    // PDFs
    Route::get('/pagos/{pago}/comprobante',              [DocumentoPdfController::class, 'comprobantePago'])->name('pagos.comprobante');
    Route::get('/expedientes/{expediente}/constancia',   [DocumentoPdfController::class, 'constanciaExpediente'])->name('expedientes.constancia');
    Route::get('/expedientes/{expediente}/resolucion',   [DocumentoPdfController::class, 'resolucionExpediente'])->name('expedientes.resolucion');
    Route::post('/documentos/carta-poder',               [DocumentoPdfController::class, 'cartaPoder'])->name('documentos.carta-poder');
    Route::get('/licencias/{licencia}/pdf',              [DocumentoPdfController::class, 'licencia'])->name('licencias.pdf');
    Route::get('/planillas/{planilla}/boleta',           [DocumentoPdfController::class, 'boletaPlanilla'])->name('planillas.boleta');
});
