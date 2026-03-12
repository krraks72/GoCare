<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AnalisisFixture
 */
class AnalisisFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'analisis';
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
                'fecha' => '2024-07-22',
                'causa_externa' => 'Lorem ipsum dolor sit amet',
                'finalidad_consulta' => 'Lorem ipsum dolor sit amet',
                'analisis' => 'Lorem ipsum dolor sit amet',
                'plan_manejo' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-07-22',
                'modified' => '2024-07-22',
            ],
        ];
        parent::init();
    }
}
