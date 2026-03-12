<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ObstetricosFixture
 */
class ObstetricosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'registro_id' => 1,
                'embarazo_actual' => 1,
                'trimestre' => 1,
                'metodo_planificacion' => 'Lorem ipsum dolor sit amet',
                'menarquia' => '2023-08-15',
                'fur' => '2023-08-15',
                'ciclos' => 'Lorem ipsum dolor sit amet',
                'gestacioinales' => 1,
                'partos' => 1,
                'abortos' => 1,
                'vivos' => 1,
                'mortinatos' => 1,
                'ectopicos' => 1,
                'gemelares' => 1,
                'ultimo_parto' => '2023-08-15',
                'mola_id' => 1,
                'mola' => 'Lorem ipsum dolor sit amet',
                'muertes_perinatales_ps' => 1,
                'muertes_perinatales_pm' => 1,
                'ultima_citologia' => '2023-08-15',
                'resultado_citologia' => 'Lorem ipsum dolor sit amet',
                'fecha_vph' => '2023-08-15',
                'resultado_vph' => 'Lorem ipsum dolor sit amet',
                'fecha_colposcopia' => '2023-08-15',
                'otros_antecedentes' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-08-15',
                'modified' => '2023-08-15',
            ],
        ];
        parent::init();
    }
}
