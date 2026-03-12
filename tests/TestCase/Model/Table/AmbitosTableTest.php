<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AmbitosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AmbitosTable Test Case
 */
class AmbitosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AmbitosTable
     */
    protected $Ambitos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Ambitos',
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
        $config = $this->getTableLocator()->exists('Ambitos') ? [] : ['className' => AmbitosTable::class];
        $this->Ambitos = $this->getTableLocator()->get('Ambitos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ambitos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AmbitosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
