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
                'quantidade_estoque' => 10,
                'data_reposicao' => '2024-01-01',
                'preco_unitario' => 100,
                'descricao' => 'Produto 1',
                'nome_produto' => 'produto1',
                'codigo_produto' => 'Sl1Ba',
                'categoria_id' => 1
            ],
            [
                'id' => 2,
                'quantidade_estoque' => 28,
                'data_reposicao' => '2000-10-08',
                'preco_unitario' => 10,
                'descricao' => 'Produto 2',
                'nome_produto' => 'produto2',
                'codigo_produto' => '4r56s',
                'categoria_id' => 2
            ],
            [
                'id' => 3,
                'quantidade_estoque' => 5,
                'data_reposicao' => '2024-06-06',
                'preco_unitario' => 50,
                'descricao' => 'Produto 3',
                'nome_produto' => 'produto3',
                'codigo_produto' => 'sda79',
                'categoria_id' => 3
            ]
        ];

        $table = $this->table('produtos');
        $table->insert($data)->save();
    }
}
