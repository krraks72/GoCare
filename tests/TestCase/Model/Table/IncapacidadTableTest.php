<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IncapacidadTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IncapacidadTable Test Case
 */
class IncapacidadTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\IncapacidadTable
     */
    protected $Incapacidad;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Incapacidad',
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
        $config = $this->getTableLocator()->exists('Incapacidad') ? [] : ['className' => IncapacidadTable::class];
        $this->Incapacidad = $this->getTableLocator()->get('Incapacidad', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Incapacidad);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\IncapacidadTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\IncapacidadTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
