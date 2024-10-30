<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * VendasProdutos Model
 *
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\BelongsTo $Produtos
 * @property \App\Model\Table\VendasTable&\Cake\ORM\Association\BelongsTo $Vendas
 *
 * @method \App\Model\Entity\VendasProduto newEmptyEntity()
 * @method \App\Model\Entity\VendasProduto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\VendasProduto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\VendasProduto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\VendasProduto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\VendasProduto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\VendasProduto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\VendasProduto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\VendasProduto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\VendasProduto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VendasProduto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VendasProduto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VendasProduto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VendasProduto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VendasProduto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\VendasProduto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\VendasProduto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class VendasProdutosTable extends Table
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

        $this->setTable('vendas_produtos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Vendas', [
            'foreignKey' => 'venda_id',
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
            ->decimal('valor_venda')
            ->requirePresence('valor_venda', 'create')
            ->notEmptyString('valor_venda');

        $validator
            ->decimal('desconto')
            ->allowEmptyString('desconto');

        $validator
            ->integer('numero_unidades')
            ->allowEmptyString('numero_unidades');

        $validator
            ->integer('produto_id')
            ->notEmptyString('produto_id');

        $validator
            ->integer('venda_id')
            ->notEmptyString('venda_id');

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
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'), ['errorField' => 'produto_id']);
        $rules->add($rules->existsIn(['venda_id'], 'Vendas'), ['errorField' => 'venda_id']);

        return $rules;
    }
}
