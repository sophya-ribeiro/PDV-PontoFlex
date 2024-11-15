<?= $this->Html->css('categorias') ?>
<?= $this->Html->script('categorias', ['defer']) ?>

<div class="container-lateral">
    <div class="container-lateral-nav">
        <div class="container-titulo">
            <ion-icon name="cube" class="cube-icon"></ion-icon>
            <h1 class="titulo-secao m-0">Estoque</h1>
        </div>

        <nav>
            <h2 class="subt-secao">Produtos</h2>

            <ul class="secao-navegacao m-0 p-0">
                <li><a class="itens-nav" href="<?= $this->Url->build(['controller' => 'Produtos', 'action' => 'index']) ?>">Produtos cadastrados</a></li>
                <li>
                    <a class="itens-nav" href="<?= $this->Url->build(['controller' => 'Produtos', 'action' => 'index', '#' => 'modal-cadastrar-produto']) ?>">
                        Cadastrar produto
                    </a>
                </li>
            </ul>

            <h2 class="subt-secao pt-4">Categorias</h2>

            <ul class="secao-navegacao m-0 p-0">
                <li><a class="itens-nav" href="<?= $this->Url->build(['controller' => 'Categorias', 'action' => 'index']) ?>">Categorias cadastradas</a></li>
                <li><a class="itens-nav" data-bs-toggle="modal"
                        data-bs-target="#modal-cadastrar-categoria">Cadastrar categoria</a></li>
            </ul>
        </nav>
    </div>

    <?= $this->element('default/footer'); ?>
</div>

<section class="container-central">
    <div id="container-categorias">
        <?php foreach ($categorias as $categoria) : ?>
            <div
                data-categoria-id="<?= $categoria->id ?>"
                data-categoria-nome="<?= $categoria->nome ?>"
                data-categoria-cor="<?= $categoria->cor ?>"
                class="categoria-item text-white d-flex flex-column p-3"
                style="background-color: <?= $categoria->cor ?>;">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="m-0"><?= $categoria->nome ?></h3>
                    <a data-bs-toggle="modal" data-bs-target="#modal-editar-categoria" onclick="editarDadosCategoria(<?= $categoria->id ?>)" title="Editar categoria">
                        <ion-icon name="create" class="categoria-icon"></ion-icon>
                    </a>
                </div>
                <div class="d-flex mt-auto ms-auto">
                    <?= $this->Form->create(null, [
                        'url' => [
                            'controller' => 'Categorias',
                            'action' => 'delete',
                            $categoria->id
                        ],
                        'type' => 'delete'
                    ]); ?>
                    <button class="bg-transparent p-0 border-0" type="submit"><ion-icon name="trash-outline" class="categoria-icon text-white" title="Apagar categoria"></ion-icon></button>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Início modal-cadastrar-categoria -->
<div class="modal fade" id="modal-cadastrar-categoria" tabindex="-1" aria-labelledby="modal-cadastrar-categoria"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0">
            <div class="modal-header text-white">
                <h1 class="modal-title p-1" id="modal-cadastrar-categoria">Nova categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" title="Fechar"></button>
            </div>

            <div class="modal-body px-5 py-4">
                <?= $this->Form->create(null, [
                    'url' => [
                        'controller' => 'Categorias',
                        'action' => 'add'
                    ],
                    'type' => 'post'
                ]); ?>
                <div class="mb-4 div-form">
                    <label for="categoria-nome" class="col-form-label mb-1">Nome <span
                            class="form-span">*</span></label>
                    <input type="text" class="form-control" name="nome" id="categoria-nome"
                        placeholder="Digite o nome da categoria" required>
                </div>

                <div class="mb-3 div-form">
                    <div class>
                        <p class="col-form-label mb-1">Selecione uma cor para a categoria <span class="form-span">*</span></p>
                    </div>

                    <?= $this->element('categorias/color-picker'); ?>
                </div>

                <div class="modal-footer border-0 p-0 pt-3">
                    <button type="submit"
                        class="btn btn-primary rounded botao border-0 py-2 px-4">
                        Cadastrar categoria
                    </button>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Fim modal-cadastrar-categoria -->

<!-- Início modal-editar-categoria -->
<div class="modal fade" id="modal-editar-categoria" tabindex="-1" aria-labelledby="modal-editar-categoria"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0">
            <div class="modal-header text-white">
                <h1 class="modal-title p-1" id="modal-editar-categoria">Editar categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-5 py-4">
                <?= $this->Form->create(null, [
                    'url' => [
                        'controller' => 'Categorias',
                        'action' => 'edit'
                    ],
                    'type' => 'post'
                ]); ?>

                <input type="hidden" name="id" id="editar-categoria-id">

                <div class="mb-4 div-form">
                    <label for="editar-categoria-nome" class="col-form-label mb-1">Nome <span
                            class="form-span">*</span></label>
                    <input type="text" class="form-control" name="nome" id="editar-categoria-nome"
                        placeholder="Digite o nome da categoria" required>
                </div>

                <div class="mb-3 div-form">
                    <div class>
                        <p class="col-form-label mb-1">Selecione uma cor para a categoria <span class="form-span">*</span></p>
                    </div>

                    <?= $this->element('categorias/color-picker', ['inputPrefix' => 'editar']); ?>
                </div>

                <div class="modal-footer border-0 p-0 pt-3">
                    <button type="submit"
                        class="btn btn-primary rounded botao border-0 py-2 px-4">
                        Editar categoria
                    </button>
                </div>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Fim modal-editar-categoria -->