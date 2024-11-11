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
                <li><a class="itens-nav" href="#">Categorias cadastradas</a></li>
                <li><a class="itens-nav" data-bs-toggle="modal"
                        data-bs-target="#modal-cadastrar-categoria">Cadastrar categoria</a></li>
            </ul>
        </nav>
    </div>

    <?= $this->element('default/footer'); ?>
</div>

<section class="container-central">

</section>

<!-- Início modal-cadastrar-categoria -->
<div class="modal fade" id="modal-cadastrar-categoria" tabindex="-1" aria-labelledby="modal-cadastrar-categoria"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content border-0">
            <div class="modal-header text-white">
                <h1 class="modal-title p-1" id="modal-cadastrar-categoria">Nova categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-5 py-4">
                <form>
                    <div class="mb-4 div-form">
                        <label for="produto-marca" class="col-form-label mb-1">Nome <span
                                class="form-span">*</span></label>
                        <input type="text" class="form-control" id="produto-marca"
                            placeholder="Digite o nome da categoria" required>
                    </div>

                    <div class="mb-3 div-form">
                        <div class>
                            <label for="produto-marca" class="col-form-label mb-1">Selecione uma cor para a categoria <span class="form-span">*</span>
                            </label>
                        </div>

                        <div class="w-100 d-flex justify-content-between">
                            <input type="radio" name="selectedColor" id="color1" class="color-picker-input"
                                value="#dd4baf" required>
                            <label for="color1" class="color-picker-label"
                                style="background-color: #dd4baf;"></label>

                            <input type="radio" name="selectedColor" id="color2" class="color-picker-input"
                                value="#bd4bdd">
                            <label for="color2" class="color-picker-label"
                                style="background-color: #bd4bdd;"></label>

                            <input type="radio" name="selectedColor" id="color3" class="color-picker-input"
                                value="#774bdd">
                            <label for="color3" class="color-picker-label"
                                style="background-color: #774bdd;"></label>

                            <input type="radio" name="selectedColor" id="color4" class="color-picker-input"
                                value="#3e4cd2">
                            <label for="color4" class="color-picker-label"
                                style="background-color: #3e4cd2;"></label>

                            <input type="radio" name="selectedColor" id="color5" class="color-picker-input"
                                value="#3e80d2">
                            <label for="color5" class="color-picker-label"
                                style="background-color: #3e80d2;"></label>

                            <input type="radio" name="selectedColor" id="color6" class="color-picker-input"
                                value="#218a99">
                            <label for="color6" class="color-picker-label"
                                style="background-color: #218a99;"></label>

                            <input type="radio" name="selectedColor" id="color7" class="color-picker-input"
                                value="#218a99">
                            <label for="color7" class="color-picker-label"
                                style="background-color: #218a99;"></label>

                            <input type="radio" name="selectedColor" id="color8" class="color-picker-input"
                                value="#1a9f49">
                            <label for="color8" class="color-picker-label"
                                style="background-color: #1a9f49;"></label>

                            <input type="radio" name="selectedColor" id="color9" class="color-picker-input"
                                value="#899a16">
                            <label for="color9" class="color-picker-label"
                                style="background-color: #899a16;"></label>

                            <input type="radio" name="selectedColor" id="color10" class="color-picker-input"
                                value="#c96516">
                            <label for="color10" class="color-picker-label"
                                style="background-color: #c96516;"></label>

                            <input type="radio" name="selectedColor" id="color10" class="color-picker-input"
                                value="#db351b">
                            <label for="color10" class="color-picker-label"
                                style="background-color: #db351b;"></label>
                        </div>

                    </div>

                    <div class="modal-footer border-0 p-0 pt-3">
                        <button type="submit"
                            class="btn btn-primary rounded botao border-0 py-2 px-4">
                            Cadastrar categoria
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Fim modal-cadastrar-categoria -->