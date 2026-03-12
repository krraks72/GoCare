<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RevisionesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RevisionesTable Test Case
 */
class RevisionesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RevisionesTable
     */
    protected $Revisiones;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Revisiones',
        'app.Registros',
        'app.Sistemas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Revisiones') ? [] : ['className' => RevisionesTable::class];
        $this->Revisiones = $this->getTableLocator()->get('Revisiones', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Revisiones);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RevisionesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RevisionesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
