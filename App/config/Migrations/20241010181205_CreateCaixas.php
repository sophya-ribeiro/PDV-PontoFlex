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

        $table->addColumn('inst_abertura', 'datetime', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('inst_fechamento', 'datetime', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('oper_caixa', 'string', [
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('venda_id', 'integer')
            ->addForeignKey(
                'venda_id',
                'vendas',
                'id',
                [
                    'delete' => 'CASCADE',
                    'update' => 'CASCADE'
                ]
            );

        $table->create();
    }
}
