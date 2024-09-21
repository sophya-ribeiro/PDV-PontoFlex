# PontoFLex

## Instruções de setup

1. Clone o repositório

    ```sh
    git clone https://github.com/sophya-ribeiro/PDV-PontoFlex
    ```

    ```sh
    cd PDV-PontoFlex
    ```

2. Defina as permissões para tmp e logs

    ```sh
    mkdir -p logs tmp && chmod -R 777 logs tmp
    ```

3. Faça build do container Docker

    ```sh
    cd App
    ```

    ```sh
    docker compose up -d --build
    ```

4. Se tudo ocorreu bem, o projeto pode ser acessado em http://localhost:8084/
