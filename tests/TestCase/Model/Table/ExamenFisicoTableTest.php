<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ExamenFisicoTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ExamenFisicoTable Test Case
 */
class ExamenFisicoTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ExamenFisicoTable
     */
    protected $ExamenFisico;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.ExamenFisico',
        'app.Registros',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ExamenFisico') ? [] : ['className' => ExamenFisicoTable::class];
        $this->ExamenFisico = $this->getTableLocator()->get('ExamenFisico', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ExamenFisico);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ExamenFisicoTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ExamenFisicoTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
