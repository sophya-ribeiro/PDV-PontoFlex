<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Funcionarios Model
 *
 * @property \App\Model\Table\PapeisTable&\Cake\ORM\Association\BelongsTo $Papeis
 *
 * @method \App\Model\Entity\Funcionario newEmptyEntity()
 * @method \App\Model\Entity\Funcionario newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Funcionario> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Funcionario get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Funcionario findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Funcionario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Funcionario> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Funcionario|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Funcionario saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Funcionario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Funcionario>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Funcionario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Funcionario> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Funcionario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Funcionario>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Funcionario>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Funcionario> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FuncionariosTable extends Table
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

        $this->setTable('funcionarios');
        $this->setDisplayField('cpf');
        $this->setPrimaryKey('cpf');

        $this->belongsTo('Papeis', [
            'foreignKey' => 'papel_id',
            'joinType' => 'INNER',
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
            ->scalar('nome_completo')
            ->maxLength('nome_completo', 255)
            ->requirePresence('nome_completo', 'create')
            ->notEmptyString('nome_completo');

        $validator
            ->date('data_nascimento')
            ->requirePresence('data_nascimento', 'create')
            ->notEmptyDate('data_nascimento');

        $validator
            ->date('data_contratacao')
            ->requirePresence('data_contratacao', 'create')
            ->notEmptyDate('data_contratacao');

        $validator
            ->scalar('nome_usuario')
            ->maxLength('nome_usuario', 255)
            ->requirePresence('nome_usuario', 'create')
            ->notEmptyString('nome_usuario')
            ->add('nome_usuario', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->scalar('senha')
            ->maxLength('senha', 255)
            ->requirePresence('senha', 'create')
            ->notEmptyString('senha');

        $validator
            ->integer('papel_id')
            ->notEmptyString('papel_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['nome_usuario']), ['errorField' => 'nome_usuario']);
        $rules->add($rules->existsIn(['papel_id'], 'Papeis'), ['errorField' => 'papel_id']);

        return $rules;
    }
}
