# PontoFLex

## Instruções de setup

1. Clone o repositório

    ```sh
    git clone https://github.com/sophya-ribeiro/PDV-PontoFlex
    ```

    ```sh
    cd PDV-PontoFlex/App
    ```

2. Faça build do container Docker

    ```sh
    docker compose up -d --build
    ```

3. Acesse o container do app

    ```sh
    docker exec -it pontoflex-dev-1 bash
    ```

4. Instale as dependências

    ```sh
    composer install -n
    ```

5. Execute as migrations do banco de dados

    ```sh
    bin/cake migrations migrate
    ```

6. Popule as tabelas necessárias no banco de dados

    ```sh
    bin/cake migrations seed
    ```

7. Se tudo ocorreu bem, o projeto pode ser acessado em  http://localhost:8084/
