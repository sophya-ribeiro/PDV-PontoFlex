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
                'id' => 1,
                'nome_completo' => 'Lorem ipsum dolor sit amet',
                'data_nascimento' => '2024-10-03',
                'data_contratacao' => '2024-10-03',
                'nome_usuario' => 'Lorem ipsum dolor sit amet',
                'senha' => 'Lorem ipsum dolor sit amet',
                'papel_id' => 1,
            ],
        ];
        parent::init();
    }
}
