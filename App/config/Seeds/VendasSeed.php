<?php

declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Vendas seed.
 */
class VendasSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'forma_pagamento' => 'Pix',
                'quantidade_parcelas' => 1,
                'data_venda' => '2024-08-02',
                'valor_total' => 56,
                'desconto_total' => 0,
                'operador_funcionario_id' => 2
            ],
            [
                'id' => 2,
                'forma_pagamento' => 'Pix',
                'quantidade_parcelas' => 1,
                'data_venda' => '2023-12-12',
                'valor_total' => 122,
                'desconto_total' => 10,
                'operador_funcionario_id' => 2
            ]

        ];

        $table = $this->table('vendas');
        $table->insert($data)->save();
    }
}
