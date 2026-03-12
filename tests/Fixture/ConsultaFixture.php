<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConsultaFixture
 */
class ConsultaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'consulta';
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
                'sevicios_publicos' => 'Lorem ipsum dolor sit amet',
                'unidad_sanitaria' => 'Lorem ipsum dolor sit amet',
                'condicion_ingreso' => 'Lorem ipsum dolor sit amet',
                'ambito_id' => 1,
                'motivo_id' => 1,
                'motivo_consulta' => 'Lorem ipsum dolor sit amet',
                'enfermedad_actual' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-11-17',
                'modified' => '2023-11-17',
            ],
        ];
        parent::init();
    }
}
