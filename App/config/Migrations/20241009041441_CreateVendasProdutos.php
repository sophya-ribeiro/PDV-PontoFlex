<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateVendasProdutos extends AbstractMigration
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
        $table = $this->table('vendas_produtos');

        $table->addColumn('valor_venda', 'decimal', [
            'precision' => 10,
            'scale' => 2
        ]);

        $table->addColumn('desconto', 'decimal', [
            'precision' => 10,
            'default' => 0,
            'null' => true,
            'scale' => 2
        ]);

        $table->addColumn('operador_caixa', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);

        $table->addColumn('n_unidades', 'integer', [
            'default' => 0,
            'null' => true
        ]);

        $table->addColumn('produto_id', 'integer')->addForeignKey(
            'produto_id',
            'produtos',
            'id',
            [
                'delete' => 'CASCADE',
                'update' => 'CASCADE'
            ]
        );

        $table->create();
    }
}
