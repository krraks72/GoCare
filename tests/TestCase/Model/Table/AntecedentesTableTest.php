<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AntecedentesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AntecedentesTable Test Case
 */
class AntecedentesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AntecedentesTable
     */
    protected $Antecedentes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Antecedentes',
        'app.Registros',
        'app.TipoAntecedentes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Antecedentes') ? [] : ['className' => AntecedentesTable::class];
        $this->Antecedentes = $this->getTableLocator()->get('Antecedentes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Antecedentes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AntecedentesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AntecedentesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
