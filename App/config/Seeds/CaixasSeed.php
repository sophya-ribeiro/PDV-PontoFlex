<?php

declare(strict_types=1);

use App\Model\Entity\Venda;
use Migrations\AbstractSeed;


class CaixasSeed extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'FuncionariosSeed',
        ];
    }

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
                'fundo_troco' => 50.0,
                'instante_abertura' => '2024-09-12 10:00:00',
                'instante_fechamento' => '2024-09-12 17:00:00',
                'operador_funcionario_cpf' => '22233344455',
            ]
        ];

        $table = $this->table('caixas');
        $table->insert($data)->save();
    }
}
