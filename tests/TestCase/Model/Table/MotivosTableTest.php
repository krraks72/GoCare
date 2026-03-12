<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MotivosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MotivosTable Test Case
 */
class MotivosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MotivosTable
     */
    protected $Motivos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Motivos',
        'app.Consulta',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Motivos') ? [] : ['className' => MotivosTable::class];
        $this->Motivos = $this->getTableLocator()->get('Motivos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Motivos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\MotivosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
