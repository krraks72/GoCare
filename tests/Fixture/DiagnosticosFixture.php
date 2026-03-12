<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DiagnosticosFixture
 */
class DiagnosticosFixture extends TestFixture
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
                'codigo' => 'Lore',
                'descripcion' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
