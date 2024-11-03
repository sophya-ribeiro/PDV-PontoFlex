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
            'Mais recentes' => ['Produtos.id' => 'ASC'],
            'Mais antigos' => ['Produtos.id' => 'DESC'],
            'Maior quantidade' => ['Produtos.quantidade_estoque' => 'DESC'],
            'Menor quantidade' => ['Produtos.quantidade_estoque' => 'ASC'],
            'Maior preço' => ['Produtos.preco_unitario' => 'DESC'],
            'Menor preço' => ['Produtos.preco_unitario' => 'ASC'],
        ];

        $filtro = 'Mais recentes';

        if (array_key_exists($this->request->getQuery('filtro'), $ordem)) {
            $filtro = $this->request->getQuery('filtro');
        }

        $produtos = $this->Produtos->find()
            ->contain(['Categorias'])
            ->orderBy($ordem[$filtro])
            ->all();

        $categorias = $this->Produtos->Categorias->find('list')->all();

        $this->set(compact('produtos', 'categorias', 'filtro'));
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
                $this->Flash->success(__('The produto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The produto could not be saved. Please, try again.'));
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
                $this->Flash->success(__('The produto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The produto could not be saved. Please, try again.'));
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
