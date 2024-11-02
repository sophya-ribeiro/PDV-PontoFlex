<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Produto Entity
 *
 * @property int $id
 * @property string $codigo
 * @property string $nome
 * @property string $marca
 * @property string|null $modelo
 * @property string $lote
 * @property int|null $quantidade_estoque
 * @property string $preco_unitario
 * @property \Cake\I18n\Date|null $data_validade
 * @property int $categoria_id
 *
 * @property \App\Model\Entity\Categoria $categoria
 * @property \App\Model\Entity\Venda[] $vendas
 */
class Produto extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'codigo' => true,
        'nome' => true,
        'marca' => true,
        'modelo' => true,
        'lote' => true,
        'quantidade_estoque' => true,
        'preco_unitario' => true,
        'data_validade' => true,
        'categoria_id' => true,
        'categoria' => true,
        'vendas' => true,
    ];
}
