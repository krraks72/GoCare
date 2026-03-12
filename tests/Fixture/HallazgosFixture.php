<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * HallazgosFixture
 */
class HallazgosFixture extends TestFixture
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
                'tipo_hallazgo_id' => 1,
                'hallazgo' => 'Lorem ipsum dolor sit amet',
                'valor' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-08-15',
                'modified' => '2023-08-15',
            ],
        ];
        parent::init();
    }
}
