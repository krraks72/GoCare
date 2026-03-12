<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AntecedentesFixture
 */
class AntecedentesFixture extends TestFixture
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
                'fecha' => '2023-11-17',
                'valor' => 'Lorem ipsum dolor sit amet',
                'tipo_antecedente_id' => 1,
                'created' => '2023-11-17',
                'modified' => '2023-11-17',
            ],
        ];
        parent::init();
    }
}
