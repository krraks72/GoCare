<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RevisionesFixture
 */
class RevisionesFixture extends TestFixture
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
                'valor' => 'Lorem ipsum dolor sit amet',
                'sistema_id' => 1,
                'created' => '2025-03-03 10:06:53',
                'modified' => '2025-03-03 10:06:53',
            ],
        ];
        parent::init();
    }
}
