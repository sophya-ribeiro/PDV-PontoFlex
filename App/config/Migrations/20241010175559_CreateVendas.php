<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateVendas extends AbstractMigration
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
        $table = $this->table('vendas');

        $table->addColumn('formato_pagamento', 'string',[
            'default' => null,
            'limit' => 100,
            'null' => false
        ]);

        $table->addColumn('data_venda', 'date',[
            'default' => null,
            'null' => false
        ]);

        $table->addColumn('valor_total', 'decimal',[
            'precision' => 10,
            'default' => 0,
            'null' => false,
            'scale' => 2
        ]);

        $table->addColumn('desconto_total', 'decimal',[
            'precision' => 10,
            'default' => 0,
            'null' => true,
            'scale' => 2
        ]);

        
        $table->create();
    }
}
