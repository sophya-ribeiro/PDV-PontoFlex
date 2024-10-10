<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FuncionariosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FuncionariosTable Test Case
 */
class FuncionariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FuncionariosTable
     */
    protected $Funcionarios;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Funcionarios',
        'app.Papeis',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Funcionarios') ? [] : ['className' => FuncionariosTable::class];
        $this->Funcionarios = $this->getTableLocator()->get('Funcionarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Funcionarios);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\FuncionariosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\FuncionariosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
