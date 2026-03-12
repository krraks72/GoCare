<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * IncapacidadFixture
 */
class IncapacidadFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'incapacidad';
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
                'nombre_convenio' => 'Lorem ipsum dolor sit amet',
                'tipo_identificacion' => 'Lo',
                'numero_identificacion' => 'Lorem ipsum dolor ',
                'nombre_paciente' => 'Lorem ipsum dolor sit amet',
                'genero' => 'Lorem ip',
                'dias_inca' => 1,
                'prioridad' => 'Lorem ip',
                'observaciones' => 'Lorem ipsum dolor sit amet',
                'fecha_inicial' => 'Lorem ip',
                'fecha_final' => 'Lorem ip',
                'created' => '2024-07-22 20:45:33',
                'modified' => '2024-07-22 20:45:33',
            ],
        ];
        parent::init();
    }
}
