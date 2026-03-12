<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RipsFixture
 */
class RipsFixture extends TestFixture
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
                'tipo_diagnostico' => 'Lorem ipsum dolor sit amet',
                'diagnostico_id' => 1,
                'created' => '2024-07-22',
                'modified' => '2024-07-22',
            ],
        ];
        parent::init();
    }
}
