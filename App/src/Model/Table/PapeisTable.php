<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Papeis Model
 *
 * @method \App\Model\Entity\Papel newEmptyEntity()
 * @method \App\Model\Entity\Papel newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Papel> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Papel get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Papel findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Papel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Papel> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Papel|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Papel saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Papel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Papel>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Papel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Papel> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Papel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Papel>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Papel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Papel> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PapeisTable extends Table
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

        $this->setTable('papeis');
        $this->setDisplayField('nome');
        $this->setPrimaryKey('id');
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
            ->scalar('nome')
            ->maxLength('nome', 32)
            ->requirePresence('nome', 'create')
            ->notEmptyString('nome');

        return $validator;
    }
}
