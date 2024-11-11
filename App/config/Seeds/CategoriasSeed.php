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
                'nome' => 'Insumos',
                'cor' => '#dd4baf'
            ],
            [
                'id' => 2,
                'nome' => 'Acessórios',
                'cor' => '#bd4bdd'
            ],
            [
                'id' => 3,
                'nome' => 'Peças',
                'cor' => '#774bdd'
            ]
        ];

        $table = $this->table('categorias');
        $table->insert($data)->save();
    }
}
