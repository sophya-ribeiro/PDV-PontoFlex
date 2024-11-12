<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 */
class CategoriasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $categorias = $this->Categorias->find();

        $this->set(compact('categorias'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            try {
                $requestData = $this->request->getData();
                $this->Categorias->salvar($requestData);

                $this->Flash->success(__('Categoria cadastrada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } catch (\Throwable $th) {
                $this->Flash->error(__('A categoria não pôde ser cadastrada. Por favor, tente novamente.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Http\Response|null|void Redirects.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            try {
                $requestData = $this->request->getData();
                $this->Categorias->editar($requestData['id'], $requestData);

                $this->Flash->success(__('Categoria alterada com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } catch (\Throwable $th) {
                $this->Flash->error(__('A categoria não pôde ser alterada. Por favor, tente novamente.'));
            }
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categoria id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        try {
            $this->Categorias->deleteById($id);

            $this->Flash->success(__('Categoria apagada com sucesso.'));
        } catch (\Throwable $th) {
            $this->Flash->error(__($th->getMessage()));
        }

        return $this->redirect(['action' => 'index']);
    }
}
