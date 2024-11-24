<?php

declare(strict_types=1);

use Migrations\AbstractSeed;

class CategoriasSeed extends AbstractSeed
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
                'nome' => 'Frios',
                'cor' => '#218a99'
            ],
            [
                'id' => 2,
                'nome' => 'Açougue',
                'cor' => '#db351b'
            ],
            [
                'id' => 3,
                'nome' => 'Hortifruti',
                'cor' => '#1a9f49'
            ],
            [
                'id' => 4,
                'nome' => 'Bebidas',
                'cor' => '#3e80d2'
            ],
            [
                'id' => 5,
                'nome' => 'Limpeza',
                'cor' => '#c96516'
            ],
            [
                'id' => 6,
                'nome' => 'Condimentos',
                'cor' => '#dd4baf'
            ]
        ];

        $table = $this->table('categorias');
        $table->insert($data)->save();
    }
}
