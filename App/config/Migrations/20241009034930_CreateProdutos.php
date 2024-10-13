<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProdutos extends AbstractMigration
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
        $table = $this->table('produtos');

        $table->addColumn('quantidade_estoque', 'integer', [
            'default' => 0,
            'null' => true
        ]);

        $table->addColumn('data_reposicao', 'date', [
            'default' => null,
            'null' => true
        ]);

        $table->addColumn('preco_unitario', 'decimal', [
            'precision' => 10,
            'scale' => 2,
            'default' => 0,
            'null' => false
        ]);

        $table->addColumn('descricao', 'string', [
            'default' => null,
            'limit' => 355,
            'null' => false
        ]);

        $table->addColumn('nome_produto', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);

        $table->addColumn('codigo_produto', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);

        $table->addColumn('categoria_id', 'integer')
            ->addForeignKey(
                'categoria_id',
                'categorias',
                'id',
                [
                    'delete' => 'CASCADE',
                    'update' => 'CASCADE'
                ]
            );

        $table->create();
    }
}
