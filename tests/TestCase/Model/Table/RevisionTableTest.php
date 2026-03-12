<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RevisionTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RevisionTable Test Case
 */
class RevisionTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RevisionTable
     */
    protected $Revision;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Revision',
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
        $config = $this->getTableLocator()->exists('Revision') ? [] : ['className' => RevisionTable::class];
        $this->Revision = $this->getTableLocator()->get('Revision', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Revision);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RevisionTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\RevisionTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
