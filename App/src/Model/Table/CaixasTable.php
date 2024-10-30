<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Caixas Model
 *
 * @property \App\Model\Table\VendasTable&\Cake\ORM\Association\HasMany $Vendas
 *
 * @method \App\Model\Entity\Caixa newEmptyEntity()
 * @method \App\Model\Entity\Caixa newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Caixa> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Caixa get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Caixa findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Caixa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Caixa> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Caixa|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Caixa saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Caixa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Caixa>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Caixa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Caixa> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Caixa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Caixa>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Caixa>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Caixa> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CaixasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('caixas');
        $this->setDisplayField('operador_funcionario_cpf');
        $this->setPrimaryKey('id');

        $this->hasMany('Vendas', [
            'foreignKey' => 'caixa_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->decimal('fundo_troco')
            ->allowEmptyString('fundo_troco');

        $validator
            ->dateTime('instante_abertura')
            ->requirePresence('instante_abertura', 'create')
            ->notEmptyDateTime('instante_abertura');

        $validator
            ->dateTime('instante_fechamento')
            ->requirePresence('instante_fechamento', 'create')
            ->notEmptyDateTime('instante_fechamento');

        $validator
            ->scalar('operador_funcionario_cpf')
            ->maxLength('operador_funcionario_cpf', 11)
            ->requirePresence('operador_funcionario_cpf', 'create')
            ->notEmptyString('operador_funcionario_cpf');

        return $validator;
    }
}
