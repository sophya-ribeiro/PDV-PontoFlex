<main>

        <div class="container-lateral">

            <div class="container-lateral-nav">
                <div class="container-titulo">
                    <ion-icon name="cube" class="cube-icon"></ion-icon>
                    <h1 class="titulo-secao m-0">Estoque</h1>
                </div>

                <nav>
                    <h2 class="subt-secao">Produtos</h2>

                    <ul class="secao-navegacao m-0 p-0">
                        <li><a class="itens-nav" href="#">Produtos cadastrados</a></li>
                        <li><a class="itens-nav" data-bs-toggle="modal"
                                data-bs-target="#modalCadastrarProduto">Cadastrar
                                produto</a></li>
                    </ul>

                    <h2 class="subt-secao pt-4">Categorias</h2>

                    <ul class="secao-navegacao m-0 p-0">
                        <li><a class="itens-nav" href="#">Categorias cadastradas</a></li>
                        <li><a class="itens-nav" data-bs-toggle="modal"
                                data-bs-target="#modalCadastrarCategoria">Cadastrar categoria</a></li>
                    </ul>

                </nav>
            </div>


            <footer>
                <a class="" href="#">Termos e condições</a>
                <a class="" href="#">Suporte</a>

                <div>
                    © 2024 PontoFlex. <br>
                    Todos direitos reservados
                </div>

            </footer>

        </div>

        <section class="container-central">

            <div class="busca m-0">

                <div class="busca-botao">
                    <input class="form-control border rounded-pill busca-input" type="text" id="example-search-input"
                        value="" placeholder="Buscar produto...">
                    <ion-icon name="search" class="search-icon"></ion-icon>
                </div>


                <div class="filtro">
                    <ion-icon name="filter" class="filter-icon"></ion-icon>
                    <h1 class="texto-filtro m-0">Filtrar por:</h1>
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle rounded btn-secondary px-4 py-2" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Mais recentes
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item dropdown-item--primeiro" href="#">Mais antigos</a></li>
                            <li><a class="dropdown-item" href="#">Maior quantidade</a></li>
                            <li><a class="dropdown-item" href="#">Menor quantidade</a></li>
                            <li><a class="dropdown-item" href="#">Maior preço</a></li>
                            <li><a class="dropdown-item dropdown-item--ultimo" href="#">Menor preço</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <!-- INÍCIO MODAL CADASTRAR PRODUTO -->

            <div class="modal fade" id="modalCadastrarProduto" tabindex="-1" aria-labelledby="modalCadastrarProduto"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <div class="modal-content border-0">
                        <div class="modal-header text-white">
                            <h1 class="modal-title p-1" id="modalCadastrarProduto">Novo produto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                            <form>
                                <div class="mb-3 div-form">

                                    <div class="w-nome">
                                        <label for="produto-nome" class="col-form-label">Nome <span
                                                class="form-span">*</span></label>
                                        <input type="text" class="form-control" id="produto-nome"
                                            placeholder="Digite o nome do produto" required>
                                    </div>

                                    <div class="w-categoria">
                                        <label for="produto-nome" class="col-form-label">Categoria <span
                                                class="form-span">*</span></label>

                                        <div class="dropdown w-dropdown">
                                            <button class="btn btn-secondary dropdown-toggle w-dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Selecione a categoria
                                            </button>
                                            <ul class="dropdown-menu overflow-hidden">
                                                <li><a class="dropdown-item" href="#">Insumos</a></li>
                                                <li><a class="dropdown-item" href="#">Acessórios</a></li>
                                                <li><a class="dropdown-item" href="#">Peças</a></li>
                                                <li><a class="dropdown-item" href="#">Produtos</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                                <div class="mb-3 div-form">

                                    <div class="w-marca">
                                        <label for="produto-marca" class="col-form-label">Marca <span
                                                class="form-span">*</span></label>
                                        <input type="text" class="form-control" id="produto-marca"
                                            placeholder="Digite a marca do produto" required>
                                    </div>

                                    <div class="w-modelo">
                                        <label for="produto-modelo" class="col-form-label">Modelo <span
                                                class="form-span">*</span></label>
                                        <input type="text" class="form-control" id="produto-modelo"
                                            placeholder="Digite o modelo do produto" required>
                                    </div>

                                    <div class="w-lote">
                                        <label for="produto-lote" class="col-form-label">Lote <span
                                                class="form-span">*</span></label>
                                        <input type="text" class="form-control" id="produto-lote" placeholder="Lote"
                                            required>
                                    </div>

                                </div>

                                <div class="mb-3 div-form">

                                    <div>
                                        <label for="produto-marca" class="col-form-label">Código <span
                                                class="form-span">*</span></label>
                                        <input type="text" class="form-control" id="produto-codigo"
                                            placeholder="1234567890ABC" required>
                                    </div>

                                    <div>
                                        <label for="produto-preco" class="col-form-label">Preço <span
                                                class="form-span">*</span></label>
                                        <input type="text" class="form-control" id="produto-preco" placeholder="R$00,00"
                                            required>
                                    </div>

                                    <div>
                                        <label for="produto-lote" class="col-form-label">Quantidade <span
                                                class="form-span">*</span></label>
                                        <input type="number" class="form-control" id="produto-quantidade"
                                            placeholder="0" required>
                                    </div>

                                    <div>
                                        <label for="produto-lote" class="col-form-label">Validade</label>
                                        <input type="date" class="form-control" id="produto-validade"
                                            placeholder="Lote">
                                        <p class="validade-texto">Deixe vazio caso não tenha.</p>
                                    </div>

                                </div>


                                <div class="modal-footer border-0 p-0 pt-3">
                                    <button type="submit"
                                        class="btn btn-primary rounded botao border-0 py-2 px-4">Cadastrar
                                        produto</button>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>
            </div>

            <!-- INÍCIO MODAL CADASTRAR CATEGORIA -->

            <div class="modal fade" id="modalCadastrarCategoria" tabindex="-1" aria-labelledby="modalCadastrarCategoria"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <div class="modal-content border-0">
                        <div class="modal-header text-white">
                            <h1 class="modal-title p-1" id="modalCadastrarCategoria">Nova categoria</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">

                            <form>

                                <div class="mb-3 div-form">

                                    <div class="w-100">
                                        <label for="produto-marca" class="col-form-label">Nome <span
                                                class="form-span">*</span></label>
                                        <input type="text" class="form-control" id="produto-marca"
                                            placeholder="Digite um nome para sua categoria" required>
                                    </div>

                                </div>

                                <div class="mb-3 div-form">

                                    <div class>
                                        <label for="produto-marca" class="col-form-label">Nome <span
                                                class="form-span">*</span></label>
                                    </div>

                                    <div class="w-100">

                                        <input type="radio" name="selectedColor" id="color1" class="color-picker-input"
                                            value="#FF5733" required>
                                        <label for="color1" class="color-picker-label"
                                            style="background-color: #FF5733;"></label>
    
                                        <input type="radio" name="selectedColor" id="color2" class="color-picker-input"
                                            value="#33FF57">
                                        <label for="color2" class="color-picker-label"
                                            style="background-color: #33FF57;"></label>
    
                                        <input type="radio" name="selectedColor" id="color3" class="color-picker-input"
                                            value="#3357FF">
                                        <label for="color3" class="color-picker-label"
                                            style="background-color: #3357FF;"></label>
    
                                        <input type="radio" name="selectedColor" id="color4" class="color-picker-input"
                                            value="#FF33FF">
                                        <label for="color4" class="color-picker-label"
                                            style="background-color: #FF33FF;"></label>
    
                                        <input type="radio" name="selectedColor" id="color5" class="color-picker-input"
                                            value="#FFFF33">
                                        <label for="color5" class="color-picker-label"
                                            style="background-color: #FFFF33;"></label>
    
                                        <input type="radio" name="selectedColor" id="color6" class="color-picker-input"
                                            value="#57FF33">
                                        <label for="color6" class="color-picker-label"
                                            style="background-color: #57FF33;"></label>
    
                                        <input type="radio" name="selectedColor" id="color7" class="color-picker-input"
                                            value="#FF3357">
                                        <label for="color7" class="color-picker-label"
                                            style="background-color: #FF3357;"></label>
    
                                        <input type="radio" name="selectedColor" id="color8" class="color-picker-input"
                                            value="#33FFF5">
                                        <label for="color8" class="color-picker-label"
                                            style="background-color: #33FFF5;"></label>
    
                                        <input type="radio" name="selectedColor" id="color9" class="color-picker-input"
                                            value="#F533FF">
                                        <label for="color9" class="color-picker-label"
                                            style="background-color: #F533FF;"></label>
    
                                        <input type="radio" name="selectedColor" id="color10" class="color-picker-input"
                                            value="#FFAA33">
                                        <label for="color10" class="color-picker-label"
                                            style="background-color: #FFAA33;"></label>
                                    </div>

                                </div>

                                <div class="modal-footer border-0 p-0 pt-3">
                                    <button type="submit"
                                        class="btn btn-primary rounded botao border-0 py-2 px-4">Cadastrar
                                        categoria</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- FIM MODAL CADASTRAR CATEGORIA -->

            <!-- Inicio modal Editar categoria -->

            <div class="modal fade" id="modalEditarCategoria" tabindex="-1" aria-labelledby="modalEditarCategoria"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">

                    <div class="modal-content border-0">
                        <div class="modal-header text-white">
                            <h1 class="modal-title p-1" id="modalEditarCategoria">Editar categoria</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <input type="hidden" name="id" id="edit-categoria-id">
                        
                        <div class="modal-body">

                            <form action="edit">

                                <div class="mb-3 div-form">

                                    <div class="w-100">
                                        <label for="nome-categoria" class="col-form-label">Nome <span
                                                class="form-span">*</span></label>
                                        <input type="text" class="form-control" id="edit-nome-categoria"
                                            placeholder="Digite um nome para sua categoria" required>
                                    </div>

                                </div>

                                <div class="mb-3 div-form">

                                    <div class>
                                        <label for="produto-marca" class="col-form-label">Nome <span
                                                class="form-span">*</span></label>
                                    </div>

                                    <div class="w-100">

                                        <input type="radio" name="selectedColor" id="edit-color1" class="color-picker-input"
                                            value="#FF5733" required>
                                        <label for="color1" class="color-picker-label"
                                            style="background-color: #FF5733;"></label>
    
                                        <input type="radio" name="selectedColor" id="edit-color2" class="color-picker-input"
                                            value="#33FF57">
                                        <label for="color2" class="color-picker-label"
                                            style="background-color: #33FF57;"></label>
    
                                        <input type="radio" name="selectedColor" id="edit-color3" class="color-picker-input"
                                            value="#3357FF">
                                        <label for="color3" class="color-picker-label"
                                            style="background-color: #3357FF;"></label>
    
                                        <input type="radio" name="selectedColor" id="edit-color4" class="color-picker-input"
                                            value="#FF33FF">
                                        <label for="color4" class="color-picker-label"
                                            style="background-color: #FF33FF;"></label>
    
                                        <input type="radio" name="selectedColor" id="edit-color5" class="color-picker-input"
                                            value="#FFFF33">
                                        <label for="color5" class="color-picker-label"
                                            style="background-color: #FFFF33;"></label>
    
                                        <input type="radio" name="selectedColor" id="edit-color6" class="color-picker-input"
                                            value="#57FF33">
                                        <label for="color6" class="color-picker-label"
                                            style="background-color: #57FF33;"></label>
    
                                        <input type="radio" name="selectedColor" id="edit-color7" class="color-picker-input"
                                            value="#FF3357">
                                        <label for="color7" class="color-picker-label"
                                            style="background-color: #FF3357;"></label>
    
                                        <input type="radio" name="selectedColor" id="edit-color8" class="color-picker-input"
                                            value="#33FFF5">
                                        <label for="color8" class="color-picker-label"
                                            style="background-color: #33FFF5;"></label>
    
                                        <input type="radio" name="selectedColor" id="edit-color9" class="color-picker-input"
                                            value="#F533FF">
                                        <label for="color9" class="color-picker-label"
                                            style="background-color: #F533FF;"></label>
    
                                        <input type="radio" name="selectedColor" id="edit-color10" class="color-picker-input"
                                            value="#FFAA33">
                                        <label for="color10" class="color-picker-label"
                                            style="background-color: #FFAA33;"></label>
                                    </div>

                                </div>

                                <div class="modal-footer border-0 p-0 pt-3">
                                    <button type="submit"
                                        class="btn btn-primary rounded botao border-0 py-2 px-4">Editar categoria
                                        </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <script>
            const modalEditarCategoria = document.getElementById("modalEditarCategoria");
            const inputEditId = document.getElementById("edit-categoria-id");
            const inputEditNome = document.getElementById("edit-nome-categoria");

            function editarDadosCategoria(id) {
                const CategoriaTabela = document.querySelector(`tr[categoria-id="${id}"]`);

                const dadosCategoria ={
                    id: linhaTabela.cells[0].textContent.trim(),
                    nome: linhaTabela.cells[1].textContent.trim(),
                }
                
                inputEditId.value = dadosCategoria.id;
		        inputEditNome.value = dadosCategoria.nome;
            }

            modalEditarProduto.addEventListener('hide.bs.modal', event => {
                inputEditId.value = null;
                inputEditNome.value = null;
            })
        </script>

    </main>
