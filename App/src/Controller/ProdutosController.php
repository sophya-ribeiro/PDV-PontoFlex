<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Produto;
use App\Utility\CurrencyHelper;

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
        $filtro = $this->request->getQuery('filtro');
        $busca = $this->request->getQuery('busca');

        if (!array_key_exists($filtro, Produto::$ordens)) {
            $filtro = 'Mais recentes';
        }

        $produtos = $this->Produtos->findProdutosPorFiltroBusca($filtro, $busca);

        $produtos =  $this->paginate($produtos, ['limit' => 10]);
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
            try {
                $requestData = $this->request->getData();
                $this->Produtos->salvar($requestData);

                $this->Flash->success(__('Produto cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } catch (\Throwable $th) {
                $this->Flash->error(__('O produto não pôde ser cadastrado. Por favor, tente novamente..'));
            }
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
            try {
                $requestData = $this->request->getData();
                $this->Produtos->editar($requestData);

                $this->Flash->success(__('Produto cadastrado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } catch (\Throwable $th) {
                $this->Flash->error(__('O produto não pôde ser alterado. Por favor, tente novamente..'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }
}
