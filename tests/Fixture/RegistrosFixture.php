<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RegistrosFixture
 */
class RegistrosFixture extends TestFixture
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
                'cita' => 1,
                'nombre_convenio' => 'Lorem ipsum dolor sit amet',
                'tipo_identificacion' => 'Lo',
                'numero_identificacion' => 'Lorem ipsum dolor ',
                'nombre_paciente' => 'Lorem ipsum dolor sit amet',
                'genero' => 'L',
                'fecha_nacimiento' => '2026-02-06',
                'lugar_residencia' => 'Lorem ipsum dolor sit amet',
                'procedencia' => 'Lorem ipsum dolor sit amet',
                'profesion' => 'Lorem ipsum dolor sit amet',
                'ocupacion' => 'Lorem ipsum dolor sit amet',
                'estado_civil' => 'Lorem ipsum dolor ',
                'direccion' => 'Lorem ipsum dolor sit amet',
                'telefono_domicilio' => 'Lorem ipsum dolor ',
                'telefono_movil' => 'Lorem ipsum dolor ',
                'email' => 'Lorem ipsum dolor sit amet',
                'datos_acompanante' => 'Lorem ipsum dolor sit amet',
                'datos_responsable' => 'Lorem ipsum dolor sit amet',
                'created' => '2026-02-06 10:09:23',
                'modified' => '2026-02-06 10:09:23',
                'tipoDocMedico' => 'Lo',
                'documentoMedico' => 'Lorem ipsum dolor ',
                'estado' => 1,
                'edad' => 1,
                'especialidad' => 1,
            ],
        ];
        parent::init();
    }
}
