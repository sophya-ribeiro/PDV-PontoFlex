<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CaixasFixture
 */
class CaixasFixture extends TestFixture
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
                'fundo_troco' => 1.5,
                'instante_abertura' => '2024-10-30 14:12:17',
                'instante_fechamento' => '2024-10-30 14:12:17',
                'operador_funcionario_cpf' => 'Lorem ips',
            ],
        ];
        parent::init();
    }
}
