<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$currentRoute = strtolower($this->getName());

function navItemAtivoOuInativo(string $nomeItem, string $currentRoute): string
{
    return $currentRoute == $nomeItem ?  "nav-item-ativo" : "nav-item-inativo";
}

?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        PontoFlex
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta(
        'favicon.png',
        '/favicon.png',
        ['type' => 'icon']
    ); ?>

    <?= $this->Html->css(['style', 'default', 'bootstrap.min']) ?>

    <?= $this->Html->script(['bootstrap.bundle.min', 'main']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body class="bg-light">
    <header>
        <div>
            <img src="/img/logo-retang.png" class="img-logo">
        </div>

        <nav>
            <ul class="m-0">
                <li>
                    <a class="<?= navItemAtivoOuInativo("produtos", $currentRoute) ?>" href="<?= $this->Url->build(['controller' => 'Produtos', 'action' => 'index']) ?>">Estoque</a>
                </li>
                <li>
                    <a class="<?= navItemAtivoOuInativo("caixas", $currentRoute) ?>" href="<?= $this->Url->build(['controller' => 'Caixas', 'action' => 'index']) ?>">Caixa</a>
                </li>
                <li>
                    <a class="<?= navItemAtivoOuInativo("relatorios", $currentRoute) ?>" href="#">Relatórios</a>
                </li>
                <li>
                    <a class="<?= navItemAtivoOuInativo("usuarios", $currentRoute) ?>" href="#">Usuários</a>
                </li>
            </ul>
        </nav>

        <div class="dropdown">
            <button class="btn btn-secondary button-account" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <ion-icon name="person-circle-outline" class="person-circle-outline"></ion-icon>
                <?= $this->request->getAttribute('identity')->nome_completo ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item dropdown-item--primeiro" href="#">
                    <ion-icon name="settings-outline" class="dropdown-icon"></ion-icon>
                    Configurações
                </a>
                <a class="dropdown-item dropdown-item--ultimo" href="/logout">
                    <ion-icon name="log-out-outline" class="dropdown-icon"></ion-icon>
                    Sair da conta
                </a>
            </div>
        </div>
    </header>

    <main>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
</body>

</html>