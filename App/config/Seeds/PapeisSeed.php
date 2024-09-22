<?php

declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Papeis seed.
 */
class PapeisSeed extends AbstractSeed
{
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
                'nome' => 'Gerente'
            ],
            [
                'id' => 2,
                'nome' => 'Estoquista'
            ],
            [
                'id' => 3,
                'nome' => 'Operador de caixa'
            ],
        ];

        $table = $this->table('papeis');
        $table->insert($data)->save();
    }
}
