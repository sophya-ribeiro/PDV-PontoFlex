<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateFuncionarios extends AbstractMigration
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
        $table = $this->table('funcionarios', ['id' => false, 'primary_key' => ['cpf']]);

        $table->addColumn('cpf', 'string', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);

        $table->addColumn('nome_completo', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);

        $table->addColumn('data_nascimento', 'date', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('data_contratacao', 'date', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('nome_usuario', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ])
            ->addIndex('nome_usuario', ['unique' => true]);

        $table->addColumn('senha', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);

        $table->addColumn('papel_id', 'integer')
            ->addForeignKey(
                'papel_id',
                'papeis',
                'id',
                [
                    'delete' => 'CASCADE',
                    'update' => 'CASCADE'
                ]
            );

        $table->create();
    }
}
