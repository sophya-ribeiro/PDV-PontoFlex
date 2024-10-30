<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VendasProdutosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VendasProdutosTable Test Case
 */
class VendasProdutosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\VendasProdutosTable
     */
    protected $VendasProdutos;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.VendasProdutos',
        'app.Produtos',
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
        $config = $this->getTableLocator()->exists('VendasProdutos') ? [] : ['className' => VendasProdutosTable::class];
        $this->VendasProdutos = $this->getTableLocator()->get('VendasProdutos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->VendasProdutos);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\VendasProdutosTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\VendasProdutosTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
