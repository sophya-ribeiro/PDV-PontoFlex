<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProdutosFixture
 */
class ProdutosFixture extends TestFixture
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
                'quantidade_estoque' => 1,
                'data_reposicao' => '2024-10-30',
                'preco_unitario' => 1.5,
                'descricao' => 'Lorem ipsum dolor sit amet',
                'nome_produto' => 'Lorem ipsum dolor sit amet',
                'codigo_produto' => 'Lorem ipsum dolor sit amet',
                'categoria_id' => 1,
            ],
        ];
        parent::init();
    }
}
