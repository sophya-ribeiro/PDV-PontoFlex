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
                'codigo' => 'Lorem ipsum dolor sit amet',
                'nome' => 'Lorem ipsum dolor sit amet',
                'marca' => 'Lorem ipsum dolor sit amet',
                'modelo' => 'Lorem ipsum dolor sit amet',
                'lote' => 'Lorem ipsum dolor sit amet',
                'quantidade_estoque' => 1,
                'preco_unitario' => 1.5,
                'data_validade' => '2024-11-02',
                'categoria_id' => 1,
            ],
        ];
        parent::init();
    }
}
