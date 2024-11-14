<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Caixas Controller
 *
 * @property \App\Model\Table\CaixasTable $Caixas
 */
class CaixasController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $cpfUsuario = $this->Authentication->getIdentity()->cpf;
        $caixaAberto = $this->Caixas->findCaixaAbertoPorCpf($cpfUsuario);

        $this->render($caixaAberto ? 'index_caixa_aberto' : 'index_caixa_fechado');
    }

    /**
     * View method
     *
     * @param string|null $id Caixa id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $caixa = $this->Caixas->get($id, contain: ['Vendas']);
        $this->set(compact('caixa'));
    }

    /**
     * Abrir caixa method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function abrirCaixa()
    {
        if ($this->request->is('post')) {
            try {
                $cpfUsuario = $this->Authentication->getIdentity()->cpf;

                $this->Caixas->abrirCaixa($cpfUsuario);

                $this->Flash->success(__('Caixa aberto com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } catch (\Throwable $th) {
                $this->Flash->error(__($th->getMessage()));
            }
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Caixa id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $caixa = $this->Caixas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caixa = $this->Caixas->patchEntity($caixa, $this->request->getData());
            if ($this->Caixas->save($caixa)) {
                $this->Flash->success(__('The caixa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The caixa could not be saved. Please, try again.'));
        }
        $this->set(compact('caixa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Caixa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $caixa = $this->Caixas->get($id);
        if ($this->Caixas->delete($caixa)) {
            $this->Flash->success(__('The caixa has been deleted.'));
        } else {
            $this->Flash->error(__('The caixa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
