<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CaixasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CaixasTable Test Case
 */
class CaixasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CaixasTable
     */
    protected $Caixas;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Caixas',
        'app.Vendas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Caixas') ? [] : ['className' => CaixasTable::class];
        $this->Caixas = $this->getTableLocator()->get('Caixas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Caixas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CaixasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
