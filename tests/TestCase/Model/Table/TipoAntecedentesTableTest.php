<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoAntecedentesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoAntecedentesTable Test Case
 */
class TipoAntecedentesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoAntecedentesTable
     */
    protected $TipoAntecedentes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TipoAntecedentes',
        'app.Antecedentes',
        'app.Revision',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TipoAntecedentes') ? [] : ['className' => TipoAntecedentesTable::class];
        $this->TipoAntecedentes = $this->getTableLocator()->get('TipoAntecedentes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TipoAntecedentes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TipoAntecedentesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
