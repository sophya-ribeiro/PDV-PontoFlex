<?php

declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Vendas seed.
 */
class VendasSeed extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'FuncionariosSeed',
            'CaixasSeed'
        ];
    }

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
                'valor_total' => 300,
                'desconto_total' => 50,
                'operador_funcionario_cpf' => '22233344455',
                'caixa_id' => 1
            ],
            [
                'id' => 2,
                'forma_pagamento' => 'Cartão | Crédito',
                'quantidade_parcelas' => 1,
                'data_venda' => '2023-12-12',
                'valor_total' => 122,
                'desconto_total' => 0,
                'operador_funcionario_cpf' => '22233344455',
                'caixa_id' => 1
            ]

        ];

        $table = $this->table('vendas');
        $table->insert($data)->save();
    }
}
