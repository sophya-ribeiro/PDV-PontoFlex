<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Caixa Entity
 *
 * @property int $id
 * @property string|null $fundo_troco
 * @property \Cake\I18n\DateTime $instante_abertura
 * @property \Cake\I18n\DateTime $instante_fechamento
 * @property string $operador_funcionario_cpf
 *
 * @property \App\Model\Entity\Venda[] $vendas
 */
class Caixa extends Entity
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
        'fundo_troco' => true,
        'instante_abertura' => true,
        'instante_fechamento' => true,
        'operador_funcionario_cpf' => true,
        'vendas' => true,
    ];
}
