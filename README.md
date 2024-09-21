# PontoFLex

## Instruções de setup

1. Clone o repositório

    ```sh
    git clone https://github.com/sophya-ribeiro/PDV-PontoFlex
    ```

    ```sh
    cd PDV-PontoFlex/App
    ```

2. Defina as permissões para tmp e logs

    ```sh
    mkdir -p logs tmp && chmod -R 777 logs tmp
    ```

3. Faça build do container Docker

    ```sh
    docker compose up -d --build
    ```

4. Acesse o container do app

	```sh
	docker exec -it pontoflex-dev-1 sh
	```

5. Instale as dependências

	```sh
	cd app && composer install -n
	```

4. Se tudo ocorreu bem, o projeto pode ser acessado em http://localhost:8084/
