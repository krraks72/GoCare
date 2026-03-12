<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ObstetricosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ObstetricosTable Test Case
 */
class ObstetricosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ObstetricosTable
     */
    protected $Obstetricos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Obstetricos',
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
        $config = $this->getTableLocator()->exists('Obstetricos') ? [] : ['className' => ObstetricosTable::class];
        $this->Obstetricos = $this->getTableLocator()->get('Obstetricos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Obstetricos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ObstetricosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\ObstetricosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
