<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TipoHallazgosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TipoHallazgosTable Test Case
 */
class TipoHallazgosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TipoHallazgosTable
     */
    protected $TipoHallazgos;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.TipoHallazgos',
        'app.Hallazgos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('TipoHallazgos') ? [] : ['className' => TipoHallazgosTable::class];
        $this->TipoHallazgos = $this->getTableLocator()->get('TipoHallazgos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->TipoHallazgos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\TipoHallazgosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
