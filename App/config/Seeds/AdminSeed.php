<?php

declare(strict_types=1);

use App\Model\Entity\Papel;
use Migrations\AbstractSeed;

/**
 * Admin seed.
 */
class AdminSeed extends AbstractSeed
{
    public function getDependencies(): array
    {
        return [
            'PapeisSeed'
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
                'cpf' =>  '11122233344',
                'nome_completo' => 'Gerente Admin',
                'data_nascimento' => '2000-01-01',
                'data_contratacao' => '2024-01-01',
                'nome_usuario' => 'admin',
                'senha' => '$2y$10$nBrer.N7eTX00OZyepU0H.sYC9gFZ/mOsgIvj/uzjfruhxbbseHkK', // padrão: admin123 -> deve ser alterada
                'papel_id' => Papel::GERENTE
            ]
        ];

        $table = $this->table('funcionarios');
        $table->insert($data)->save();
    }
}
