<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FuncionariosFixture
 */
class FuncionariosFixture extends TestFixture
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
                'cpf' => '81a8971e-9a34-4af4-a85b-ffcf3c4859a7',
                'nome_completo' => 'Lorem ipsum dolor sit amet',
                'data_nascimento' => '2024-10-30',
                'data_contratacao' => '2024-10-30',
                'nome_usuario' => 'Lorem ipsum dolor sit amet',
                'senha' => 'Lorem ipsum dolor sit amet',
                'papel_id' => 1,
            ],
        ];
        parent::init();
    }
}
