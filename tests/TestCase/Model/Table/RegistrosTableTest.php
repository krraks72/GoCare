<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegistrosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegistrosTable Test Case
 */
class RegistrosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RegistrosTable
     */
    protected $Registros;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Registros',
        'app.Analisis',
        'app.Antecedentes',
        'app.Fantecedentes',
        'app.AntecedentesObstetricos',
        'app.Consulta',
        'app.Fconsulta',
        'app.ExamenFisico',
        'app.Hallazgos',
        'app.Incapacidad',
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
        $config = $this->getTableLocator()->exists('Registros') ? [] : ['className' => RegistrosTable::class];
        $this->Registros = $this->getTableLocator()->get('Registros', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Registros);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RegistrosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
