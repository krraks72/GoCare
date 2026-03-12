<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnalisisTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnalisisTable Test Case
 */
class AnalisisTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AnalisisTable
     */
    protected $Analisis;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Analisis',
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
        $config = $this->getTableLocator()->exists('Analisis') ? [] : ['className' => AnalisisTable::class];
        $this->Analisis = $this->getTableLocator()->get('Analisis', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Analisis);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AnalisisTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AnalisisTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
