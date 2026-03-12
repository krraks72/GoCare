<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RevisionFixture
 */
class RevisionFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'revision';
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
                'fecha' => '2023-08-15',
                'valor' => 'Lorem ipsum dolor sit amet',
                'sistema_id' => 1,
                'sistema' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-08-15',
                'modified' => '2023-08-15',
            ],
        ];
        parent::init();
    }
}
