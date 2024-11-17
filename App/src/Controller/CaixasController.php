<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Routing\Router;

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
        $vendas = $this->paginate($vendas, ['limit' => 5]);

        $this->set(compact('caixaAberto', 'vendas'));
    }

    /**
     * Registar Venda method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function registrarVenda()
    {
        $cpfUsuario = $this->Authentication->getIdentity()->cpf;
        $caixaAberto = $this->Caixas->findCaixaAbertoPorCpf($cpfUsuario);

        if (!$caixaAberto) {
            return $this->render('caixa_fechado');
        }

        if ($this->request->is('post')) {
            try {
                $requestData = $this->request->getData();

                $this->Vendas->registrarVenda($cpfUsuario, $requestData);

                $this->Flash->success(__('Venda concluída com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } catch (\Throwable $th) {
                $this->Flash->error(__($th->getMessage()));

                return $this->redirect(['action' => 'registrarVenda']);
            }
        }

        $this->set(compact('caixaAberto'));
    }

    /**
     * Abrir caixa method
     *
     * @return \Cake\Http\Response|null|void Redirects to index.
     */
    public function abrirCaixa()
    {
        $redirectAction = ($this->request->referer() == Router::url(['action' => 'registrarVenda'])) ? 'registrarVenda' : 'index';

        if ($this->request->is('post')) {
            $cpfUsuario = $this->Authentication->getIdentity()->cpf;

            try {
                $this->Caixas->abrirCaixa($cpfUsuario);

                $this->Flash->success(__('Caixa aberto com sucesso.'));

                return $this->redirect(['action' => $redirectAction]);
            } catch (\Throwable $th) {
                $this->Flash->error(__($th->getMessage()));
            }
        }

        return $this->redirect(['action' => $redirectAction]);
    }

    /**
     * Fechar caixa method
     *
     * @return \Cake\Http\Response|null|void Redirects to index.
     */
    public function fecharCaixa()
    {
        $redirectAction = ($this->request->referer() == Router::url(['action' => 'registrarVenda'])) ? 'registrarVenda' : 'index';

        if ($this->request->is('post')) {
            $cpfUsuario = $this->Authentication->getIdentity()->cpf;

            try {
                $this->Caixas->fecharCaixa($cpfUsuario);

                $this->Flash->success(__('Caixa fechado com sucesso.'));

                return $this->redirect(['action' => $redirectAction]);
            } catch (\Throwable $th) {
                $this->Flash->error(__($th->getMessage()));
            }
        }

        return $this->redirect(['action' => $redirectAction]);
    }
}
