<?php

declare(strict_types=1);

use App\Model\Entity\Venda;
use Migrations\AbstractSeed;


class CaixasSeed extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'VendasSeed',
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
                'inst_abertura' => '2024-09-12 10:00:00[.000]',
                'inst_fechamento' => '2024-09-12 17:00:00[.000]',
                'oper_caixa' => 'Maria',
                'venda_id' => Venda::1
            ]
        ];

        $table = $this->table('caixas');
        $table->insert($data)->save();
    }
}
