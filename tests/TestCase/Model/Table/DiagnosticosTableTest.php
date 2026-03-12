<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiagnosticosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiagnosticosTable Test Case
 */
class DiagnosticosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DiagnosticosTable
     */
    protected $Diagnosticos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Diagnosticos',
        'app.Rips',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Diagnosticos') ? [] : ['className' => DiagnosticosTable::class];
        $this->Diagnosticos = $this->getTableLocator()->get('Diagnosticos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Diagnosticos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DiagnosticosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
