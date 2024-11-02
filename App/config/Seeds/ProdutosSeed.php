<?php

declare(strict_types=1);


use Migrations\AbstractSeed;

/**
 * Produtos seed.
 */
class ProdutosSeed extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'CategoriasSeed'
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
                'codigo' => '1234567890ABC',
                'nome' => 'Produto 1',
                'marca' => 'Marca 1',
                'modelo' => 'Modelo 1',
                'lote' => '2184/32',
                'quantidade_estoque' => 10,
                'preco_unitario' => 100,
                'data_validade' => '2024-01-01',
                'categoria_id' => 1
            ],
            [
                'id' => 2,
                'codigo' => '1234567890DEF',
                'nome' => 'Produto 2',
                'marca' => 'Marca 2',
                'modelo' => 'Modelo 2',
                'lote' => '2184/32',
                'quantidade_estoque' => 28,
                'preco_unitario' => 10,
                'data_validade' => '2000-10-08',
                'categoria_id' => 2
            ],
            [
                'id' => 3,
                'codigo' => '1234567890GHI',
                'nome' => 'Produto 3',
                'marca' => 'Marca 3',
                'modelo' => 'Modelo 3',
                'lote' => '2184/32',
                'quantidade_estoque' => 5,
                'preco_unitario' => 50,
                'data_validade' => '2024-06-06',
                'categoria_id' => 3
            ]
        ];

        $table = $this->table('produtos');
        $table->insert($data)->save();
    }
}
