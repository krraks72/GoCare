<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\RegistrosController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\RegistrosController Test Case
 *
 * @uses \App\Controller\RegistrosController
 */
class RegistrosControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test return method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::return()
     */
    public function testReturn(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test pending method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::pending()
     */
    public function testPending(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test find method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::find()
     */
    public function testFind(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test fedit method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::fedit()
     */
    public function testFedit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test finish method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::finish()
     */
    public function testFinish(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test ffinish method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::ffinish()
     */
    public function testFfinish(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test failed method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::failed()
     */
    public function testFailed(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test reactived method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::reactived()
     */
    public function testReactived(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test home method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::home()
     */
    public function testHome(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test findall method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::findall()
     */
    public function testFindall(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test viewall method
     *
     * @return void
     * @uses \App\Controller\RegistrosController::viewall()
     */
    public function testViewall(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
