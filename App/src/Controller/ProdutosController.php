<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Produtos Controller
 *
 * @property \App\Model\Table\ProdutosTable $Produtos
 */
class ProdutosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $ordem = [
            'Mais recentes' => ['Produtos.id' => 'DESC'],
            'Mais antigos' => ['Produtos.id' => 'ASC'],
            'Maior quantidade' => ['Produtos.quantidade_estoque' => 'DESC'],
            'Menor quantidade' => ['Produtos.quantidade_estoque' => 'ASC'],
            'Maior preço' => ['Produtos.preco_unitario' => 'DESC'],
            'Menor preço' => ['Produtos.preco_unitario' => 'ASC'],
        ];

        $filtro = 'Mais recentes';

        if (array_key_exists($this->request->getQuery('filtro'), $ordem)) {
            $filtro = $this->request->getQuery('filtro');
        }

        $produtosQuery = $this->Produtos->find()
            ->contain(['Categorias'])
            ->orderBy($ordem[$filtro]);

        $produtos =  $this->paginate($produtosQuery, ['limit' => 10]);
        $categorias = $this->Produtos->Categorias->find('list')->all();

        $parametrosPaginacao = $produtos->pagingParams();

        $this->set(compact('produtos', 'categorias', 'filtro', 'parametrosPaginacao'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            $requestData = $this->request->getData();
            $requestData['preco_unitario'] = floatval(str_replace('.', '', $requestData['preco_unitario']));

            $produto = $this->Produtos->newEmptyEntity();
            $produto = $this->Produtos->patchEntity($produto, $requestData);

            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Produto cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('O produto não pôde ser cadastrado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null|void Redirects.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestData = $this->request->getData();
            $requestData['preco_unitario'] = floatval(str_replace('.', '', $requestData['preco_unitario']));

            $produto = $this->Produtos->get($requestData['id']);
            $produto = $this->Produtos->patchEntity($produto, $requestData);

            if ($this->Produtos->save($produto)) {
                $this->Flash->success(__('Produto alterado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('O produto não pôde ser alterado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Produto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $produto = $this->Produtos->get($id);
        if ($this->Produtos->delete($produto)) {
            $this->Flash->success(__('The produto has been deleted.'));
        } else {
            $this->Flash->error(__('The produto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
