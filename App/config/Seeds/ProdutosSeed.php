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
            // Categoria 1: Frios
            [
                'id' => 1,
                'codigo' => '7891000101010',
                'nome' => 'Queijo Muçarela',
                'marca' => 'Itambé',
                'modelo' => '500g',
                'lote' => '2401/FR',
                'quantidade_estoque' => 20,
                'preco_unitario' => 35.00,
                'data_validade' => '2024-12-31',
                'categoria_id' => 1
            ],
            [
                'id' => 2,
                'codigo' => '7891000202020',
                'nome' => 'Presunto Sadia',
                'marca' => 'Sadia',
                'modelo' => '1kg',
                'lote' => '2415/FR',
                'quantidade_estoque' => 15,
                'preco_unitario' => 45.00,
                'data_validade' => '2024-11-20',
                'categoria_id' => 1
            ],

            // Categoria 2: Açougue
            [
                'id' => 3,
                'codigo' => '7891000303030',
                'nome' => 'Filé Mignon',
                'marca' => 'Friboi',
                'modelo' => '1kg',
                'lote' => '2418/AC',
                'quantidade_estoque' => 10,
                'preco_unitario' => 110.00,
                'data_validade' => '2024-10-30',
                'categoria_id' => 2
            ],
            [
                'id' => 4,
                'codigo' => '7891000404040',
                'nome' => 'Coxa de Frango',
                'marca' => 'Seara',
                'modelo' => '500g',
                'lote' => '2420/AC',
                'quantidade_estoque' => 25,
                'preco_unitario' => 14.00,
                'data_validade' => '2024-10-15',
                'categoria_id' => 2
            ],

            // Categoria 3: Hortifruti
            [
                'id' => 5,
                'codigo' => '7891000505050',
                'nome' => 'Maçã Gala',
                'marca' => 'Fazenda Orgânica',
                'modelo' => '1kg',
                'lote' => '2501/HF',
                'quantidade_estoque' => 50,
                'preco_unitario' => 8.00,
                'data_validade' => '2024-10-01',
                'categoria_id' => 3
            ],
            [
                'id' => 6,
                'codigo' => '7891000606060',
                'nome' => 'Banana Nanica',
                'marca' => 'Fazenda Brasil',
                'modelo' => '1kg',
                'lote' => '2510/HF',
                'quantidade_estoque' => 30,
                'preco_unitario' => 6.00,
                'data_validade' => '2024-10-05',
                'categoria_id' => 3
            ],

            // Categoria 4: Bebidas
            [
                'id' => 7,
                'codigo' => '7891000707070',
                'nome' => 'Coca-Cola',
                'marca' => 'Coca-Cola',
                'modelo' => '2L',
                'lote' => '2601/BE',
                'quantidade_estoque' => 40,
                'preco_unitario' => 9.00,
                'data_validade' => '2025-01-10',
                'categoria_id' => 4
            ],
            [
                'id' => 8,
                'codigo' => '7891000808080',
                'nome' => 'Suco de Laranja',
                'marca' => 'Del Valle',
                'modelo' => '1L',
                'lote' => '2610/BE',
                'quantidade_estoque' => 35,
                'preco_unitario' => 6.50,
                'data_validade' => '2024-09-30',
                'categoria_id' => 4
            ],

            [
                'id' => 9,
                'codigo' => '7891001414141',
                'nome' => 'Skol Pilsen',
                'marca' => 'Skol',
                'modelo' => '500ml',
                'lote' => '2910/BE',
                'quantidade_estoque' => 60,
                'preco_unitario' => 4.50,
                'data_validade' => '2024-10-15',
                'categoria_id' => 4
            ],

            // Categoria 5: Limpeza
            [
                'id' => 10,
                'codigo' => '7891000909090',
                'nome' => 'Sabão em Pó',
                'marca' => 'Omo',
                'modelo' => '2kg',
                'lote' => '2701/LIM',
                'quantidade_estoque' => 20,
                'preco_unitario' => 25.00,
                'data_validade' => '2025-05-01',
                'categoria_id' => 5
            ],
            [
                'id' => 11,
                'codigo' => '7891001010101',
                'nome' => 'Detergente Ypê',
                'marca' => 'Ypê',
                'modelo' => '500ml',
                'lote' => '2715/LIM',
                'quantidade_estoque' => 50,
                'preco_unitario' => 3.50,
                'data_validade' => '2025-01-01',
                'categoria_id' => 5
            ],

            // Categoria 6: Condimentos
            [
                'id' => 12,
                'codigo' => '7891001111111',
                'nome' => 'Sal Refinado',
                'marca' => 'Cisne',
                'modelo' => '1kg',
                'lote' => '2801/COND',
                'quantidade_estoque' => 100,
                'preco_unitario' => 3.00,
                'data_validade' => '2026-07-01',
                'categoria_id' => 6
            ],
            [
                'id' => 13,
                'codigo' => '7891001212121',
                'nome' => 'Pimenta Preta Moída',
                'marca' => 'Kitano',
                'modelo' => '50g',
                'lote' => '2810/COND',
                'quantidade_estoque' => 40,
                'preco_unitario' => 8.00,
                'data_validade' => '2025-12-01',
                'categoria_id' => 6
            ],
            [
                'id' => 14,
                'codigo' => '7891001313131',
                'nome' => 'Alho Granulado',
                'marca' => 'Masterchef',
                'modelo' => '150g',
                'lote' => '2815/COND',
                'quantidade_estoque' => 20,
                'preco_unitario' => 12.00,
                'data_validade' => '2025-08-01',
                'categoria_id' => 6
            ],
        ];

        $table = $this->table('produtos');
        $table->insert($data)->save();
    }
}
