<main>
	<div class="main-div">
		<section class="secao-slogan">
			<img alt="Logotipo PontoFlex" src="/img/logo-white.png" class="logotipo">
			<h2 class="slogan-texto">Flexível como o seu negócio, <br>simples como um clique</h2>
			<h1 class="slogan-span">Comece a vender <br>agora mesmo!</h1>

			<a href="mailto:sophya.ribeiro@ufms.br" class="ancora-suporte">
				<ion-icon name="chatbubbles-outline"></ion-icon>
				Fale com o suporte
			</a>
		</section>

		<section class="secao-slogan-mobile">
			<img alt="Logotipo PontoFlex" src="/img/logo-white.png" class="logotipo">
		</section>
	</div>

	<div class="main-div">
		<?= $this->Form->create() ?>
		<div class="login-titulo">
			<ion-icon name="people" class="icon-people"></ion-icon>
			<h1 class="login-texto">Entrar na conta</h1>

		</div>
		<div class="mb-3">
			<label for="nome-usuario-input" class="form-label">Usuário</label>
			<input type="text" class="form-control" id="nome-usuario-input" name="nome_usuario" placeholder="Insira seu nome de usuário">
		</div>
		<div class="mb-3">
			<label for="senha-usuario-input" class="form-label">Senha</label>
			<input type="password" class="form-control" id="senha-usuario-input" name="senha" placeholder="Digite sua senha">
		</div>

		<button type="submit" value="Login" class="btn btn-primary border-0 py-3 mt-lg-4 mt-0 texto-botao">Entrar</button>
		<?= $this->Form->end() ?>
	</div>

	<section class="secao-slogan-mobile">
		<a href="mailto:sophya.ribeiro@ufms.br" class="ancora-suporte">
			<ion-icon name="chatbubbles-outline"></ion-icon>
			Fale com o suporte
		</a>
	</section>
</main>