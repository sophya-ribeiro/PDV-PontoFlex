<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Funcionario Entity
 *
 * @property int $id
 * @property string $nome_completo
 * @property \Cake\I18n\Date $data_nascimento
 * @property \Cake\I18n\Date $data_contratacao
 * @property string $nome_usuario
 * @property string $senha
 * @property int $papel_id
 *
 * @property \App\Model\Entity\Papei $papei
 */
class Funcionario extends Entity
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
        'nome_completo' => true,
        'data_nascimento' => true,
        'data_contratacao' => true,
        'nome_usuario' => true,
        'senha' => true,
        'papel_id' => true,
        'papei' => true,
    ];

    protected function _setSenha(string $senha)
    {
        $hasher = new DefaultPasswordHasher();

        return $hasher->hash($senha);
    }
}
