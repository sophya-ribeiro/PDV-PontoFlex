<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendasProdutosFixture
 */
class VendasProdutosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'valor_venda' => 1.5,
                'desconto' => 1.5,
                'numero_unidades' => 1,
                'produto_id' => 1,
                'venda_id' => 1,
            ],
        ];
        parent::init();
    }
}
