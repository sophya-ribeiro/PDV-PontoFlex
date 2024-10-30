<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VendasFixture
 */
class VendasFixture extends TestFixture
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
                'forma_pagamento' => 'Lorem ipsum dolor sit amet',
                'quantidade_parcelas' => 1,
                'data_venda' => '2024-10-30',
                'valor_total' => 1.5,
                'desconto_total' => 1.5,
                'operador_funcionario_cpf' => 'Lorem ips',
                'caixa_id' => 1,
            ],
        ];
        parent::init();
    }
}
