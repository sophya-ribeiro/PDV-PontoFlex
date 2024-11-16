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
    protected \App\Model\Table\VendasTable $Vendas;

    public function initialize(): void
    {
        parent::initialize();
        $this->Vendas = $this->fetchTable('Vendas');
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

        $vendas = $this->Vendas->findVendasComVendasProdutos();

        $this->set(compact('caixaAberto', 'vendas'));
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
