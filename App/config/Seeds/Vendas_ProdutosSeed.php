<?php

declare(strict_types=1);

use App\Model\Entity\Venda;
use App\Model\Entity\Produto;
use Migrations\AbstractSeed;


class Vendas_ProdutosSeed extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'VendasSeed',
            'ProdutosSeed'
        ];
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'valor_venda' => 50.5,
                'desconto' => 2,
                'operador_caixa' => 'Maria',
                'n_unidades' => 3,
                'produto_id' => Produto::PRODUTO1,
                'vendas_id' => Venda::1
            ],
            [
                'id' => 2,
                'valor_venda' => 700,
                'desconto' => 0.5,
                'operador_caixa' => 'Sophya',
                'n_unidades' => 6,
                'produto_id' => Produto::PRODUTO2,
                'vendas_id' => Venda::2
            ]
        ]
        $table = $this->table('vendas_produtos');
        $table->insert($data)->save();
    }
}
