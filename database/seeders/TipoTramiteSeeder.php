<?php

namespace Database\Seeders;

use App\Models\TipoTramite;
use Illuminate\Database\Seeder;

class TipoTramiteSeeder extends Seeder
{
    public function run(): void
    {
        $tramites = [
            ['codigo' => 'TUPA-001', 'nombre' => 'Constancia de posesión', 'area_responsable' => 'Rentas', 'costo' => 25.00, 'plazo_dias' => 10],
            ['codigo' => 'TUPA-002', 'nombre' => 'Licencia de funcionamiento', 'area_responsable' => 'Licencias', 'costo' => 180.00, 'plazo_dias' => 15],
            ['codigo' => 'TUPA-003', 'nombre' => 'Certificado de numeración', 'area_responsable' => 'Obras', 'costo' => 35.00, 'plazo_dias' => 7],
            ['codigo' => 'TUPA-004', 'nombre' => 'Declaración jurada de autovalúo', 'area_responsable' => 'Rentas', 'costo' => 0.00, 'plazo_dias' => 5],
            ['codigo' => 'TUPA-005', 'nombre' => 'Licencia de edificación', 'area_responsable' => 'Obras', 'costo' => 450.00, 'plazo_dias' => 30],
            ['codigo' => 'TUPA-006', 'nombre' => 'Certificado de compatibilidad de uso', 'area_responsable' => 'Desarrollo Urbano', 'costo' => 60.00, 'plazo_dias' => 12],
            ['codigo' => 'TUPA-007', 'nombre' => 'Fraccionamiento de deuda tributaria', 'area_responsable' => 'Rentas', 'costo' => 0.00, 'plazo_dias' => 10],
        ];

        foreach ($tramites as $tramite) {
            TipoTramite::firstOrCreate(['codigo' => $tramite['codigo']], $tramite);
        }
    }
}
