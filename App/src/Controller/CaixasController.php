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

        $this->set(compact('caixaAberto'));
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
     * @return \Cake\Http\Response|null|void Redirects to index.
     */
    public function abrirCaixa()
    {
        if ($this->request->is('post')) {
            $cpfUsuario = $this->Authentication->getIdentity()->cpf;

            try {
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
     * Fechar caixa method
     *
     * @return \Cake\Http\Response|null|void Redirects to index.
     */
    public function fecharCaixa()
    {
        if ($this->request->is('post')) {
            $cpfUsuario = $this->Authentication->getIdentity()->cpf;

            try {
                $this->Caixas->fecharCaixa($cpfUsuario);

                $this->Flash->success(__('Caixa fechado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } catch (\Throwable $th) {
                $this->Flash->error(__($th->getMessage()));
            }
        }

        return $this->redirect(['action' => 'index']);
    }
}
