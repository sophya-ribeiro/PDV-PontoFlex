<?php

declare(strict_types=1);

use Migrations\AbstractSeed;


class VendasProdutosSeed extends AbstractSeed
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
                'valor_venda' => 300,
                'desconto' => 50,
                'numero_unidades' => 3,
                'produto_id' => 1,
                'venda_id' => 1
            ],
            [
                'id' => 2,
                'valor_venda' => 60,
                'desconto' => 0,
                'numero_unidades' => 6,
                'produto_id' => 2,
                'venda_id' => 2
            ]
        ];

        $table = $this->table('vendas_produtos');
        $table->insert($data)->save();
    }
}
