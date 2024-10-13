<?php

declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCategoria extends AbstractMigration
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
        $table = $this->table('categorias');

        $table->addColumn('nome', 'string', [
            'default' => null,
            'limit' => 42,
            'null' => false
        ]);

        $table->addColumn('cor', 'string', [
            'default' => null,
            'limit' => 32,
            'null' => false
        ]);

        $table->create();
    }
}
