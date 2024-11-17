<?php

declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Venda;
use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DomainException;

/**
 * Vendas Model
 *
 * @property \App\Model\Table\CaixasTable&\Cake\ORM\Association\BelongsTo $Caixas
 * @property \App\Model\Table\ProdutosTable&\Cake\ORM\Association\BelongsToMany $Produtos
 * @property \App\Model\Table\VendasProdutosTable&\Cake\ORM\Association\HasMany $VendasProdutos
 *
 * @method \App\Model\Entity\Venda newEmptyEntity()
 * @method \App\Model\Entity\Venda newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Venda> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Venda get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Venda findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Venda patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Venda> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Venda|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Venda saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Venda>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Venda>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Venda>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Venda> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Venda>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Venda>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Venda>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Venda> deleteManyOrFail(iterable $entities, array $options = [])
 */
class VendasTable extends Table
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

        $this->setTable('vendas');
        $this->setDisplayField('forma_pagamento');
        $this->setPrimaryKey('id');

        $this->belongsTo('Caixas', [
            'foreignKey' => 'caixa_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsToMany('Produtos', [
            'foreignKey' => 'venda_id',
            'targetForeignKey' => 'produto_id',
            'joinTable' => 'vendas_produtos',
        ]);

        $this->hasMany('VendasProdutos', ['foreignKey' => 'venda_id']);
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
            ->scalar('forma_pagamento')
            ->maxLength('forma_pagamento', 100)
            ->requirePresence('forma_pagamento', 'create')
            ->notEmptyString('forma_pagamento');

        $validator
            ->integer('quantidade_parcelas')
            ->notEmptyString('quantidade_parcelas');

        $validator
            ->date('data_venda')
            ->requirePresence('data_venda', 'create')
            ->notEmptyDate('data_venda');

        $validator
            ->decimal('valor_total')
            ->notEmptyString('valor_total');

        $validator
            ->decimal('desconto_total')
            ->allowEmptyString('desconto_total');

        $validator
            ->scalar('operador_funcionario_cpf')
            ->maxLength('operador_funcionario_cpf', 11)
            ->requirePresence('operador_funcionario_cpf', 'create')
            ->notEmptyString('operador_funcionario_cpf');

        $validator
            ->integer('caixa_id')
            ->notEmptyString('caixa_id');

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
        $rules->add($rules->existsIn(['caixa_id'], 'Caixas'), ['errorField' => 'caixa_id']);

        return $rules;
    }

    public function findVendasComVendasProdutos()
    {
        return $this->find()
            ->contain(['VendasProdutos' => ['Produtos']])
            ->orderByDesc('id');
    }

    public function registrarVenda($cpfUsuario, $requestData)
    {
        $caixaAberto = $this->Caixas->findCaixaAbertoPorCpf($cpfUsuario);

        if (!$caixaAberto) {
            throw new DomainException("O caixa precisa estar aberto para registrar uma venda.", 1);
        }

        $valorTotal = 0;
        $dataAtual = date('Y-m-d');

        if (!is_numeric($requestData['desconto_total'])) {
            $requestData['desconto_total'] = 0;
        }

        foreach ($requestData['produtos'] as $produtoVenda) {
            $produto = $this->Produtos->get($produtoVenda['id']);

            $valorTotal += $produto->preco_unitario * $produtoVenda['quantidade'];
        }

        $vendaDados = [
            'forma_pagamento' => Venda::FORMAS_PAGAMENTO[$requestData['forma_pagamento']],
            'quantidade_parcelas' => $requestData['quantidade_parcelas'],
            'data_venda' => $dataAtual,
            'valor_total' => $valorTotal,
            'desconto_total' => $requestData['desconto_total'] ?? 0,
            'operador_funcionario_cpf' => $cpfUsuario,
            'caixa_id' => $caixaAberto->id,
        ];

        $venda = $this->newEntity($vendaDados);
        $venda = $this->saveOrFail($venda);

        return $this->VendasProdutos->salvarProdutosVenda($venda, $requestData['produtos']);
    }
}
