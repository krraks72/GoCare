<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConsultaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConsultaTable Test Case
 */
class ConsultaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConsultaTable
     */
    protected $Consulta;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Consulta',
        'app.Registros',
        'app.Ambitos',
        'app.Motivos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Consulta') ? [] : ['className' => ConsultaTable::class];
        $this->Consulta = $this->getTableLocator()->get('Consulta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Consulta);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ConsultaTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ConsultaTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
