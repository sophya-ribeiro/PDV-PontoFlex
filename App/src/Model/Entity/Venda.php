<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venda Entity
 *
 * @property int $id
 * @property string $forma_pagamento
 * @property int $quantidade_parcelas
 * @property \Cake\I18n\Date $data_venda
 * @property string $valor_total
 * @property string|null $desconto_total
 * @property string $operador_funcionario_cpf
 * @property int $caixa_id
 *
 * @property \App\Model\Entity\Caixa $caixa
 * @property \App\Model\Entity\Produto[] $produtos
 */
class Venda extends Entity
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
        'forma_pagamento' => true,
        'quantidade_parcelas' => true,
        'data_venda' => true,
        'valor_total' => true,
        'desconto_total' => true,
        'operador_funcionario_cpf' => true,
        'caixa_id' => true,
        'caixa' => true,
        'produtos' => true,
    ];

    public const FORMAS_PAGAMENTO = [
        'dinheiro' => 'Dinheiro',
        'pix' => 'Pix',
        'debito' => 'Cartão | Débito',
        'credito' => 'Cartão | Crédito',
    ];
}
