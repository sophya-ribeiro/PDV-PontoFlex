<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCaixas extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('caixas');

        $table->addColumn('fundo_troco', 'decimal', [
            'precision' => 10,
            'default' => 0,
            'null' => true,
            'scale' => 2
        ]);

        $table->addColumn('instante_abertura', 'datetime', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('instante_fechamento', 'datetime', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('operador_funcionario_cpf', 'string', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ])
            ->addForeignKey(
                'operador_funcionario_cpf',
                'funcionarios',
                'cpf',
                [
                    'delete' => 'CASCADE',
                    'update' => 'CASCADE'
                ]
            );

        $table->create();
    }
}
