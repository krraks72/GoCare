<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExamenFisicoFixture
 */
class ExamenFisicoFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'examen_fisico';
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
                'estado_general' => 'Lorem ipsum dolor sit amet',
                'talla' => 1,
                'peso' => 1.5,
                'saturacion' => 1,
                'frecuencia_cardiaca' => 1,
                'frecuencia_respiratoria' => 1,
                'temperatura' => 1,
                'ocular' => 1,
                'verbal' => 1,
                'motora' => 1,
                'ta_sistolica' => 1,
                'ta_diastolica' => 1,
                'created' => '2023-08-15',
                'modified' => '2023-08-15',
            ],
        ];
        parent::init();
    }
}
