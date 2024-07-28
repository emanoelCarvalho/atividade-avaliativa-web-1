# Sistema CRUD de Autores e Livros

Este projeto é uma aplicação web simples que implementa um sistema CRUD (Create, Read, Update, Delete) para gerenciar autores e livros, com relações N:M (muitos para muitos). A aplicação foi desenvolvida como parte da disciplina de Web 1.

## Funcionalidades

- Adicionar, visualizar, atualizar e excluir autores
- Adicionar, visualizar, atualizar e excluir livros
- Associar múltiplos livros a múltiplos autores e vice-versa
- Interface amigável e responsiva

## Tecnologias Utilizadas

- **PHP**: Para a lógica de back-end e manipulação de dados.
- **HTML**: Para a estrutura da aplicação web.
- **CSS**: Para a estilização da aplicação.
- **Bootstrap**: Para a criação de uma interface responsiva e moderna.
- **jQuery**: Para manipulação do DOM e interações dinâmicas na página.


## Instalação e Uso

1. Clone o repositório para sua máquina local:
    ```bash
    git clone https://github.com/emanoelCarvalho/atividade-avaliativa-web-1.git
    ```

2. Navegue até o diretório do projeto:
    ```bash
    cd atividade-avaliativa-web-1
    ```

3. Configure seu ambiente PHP e banco de dados (MySQL):
    - Crie um banco de dados chamado `biblioteca`.
    - Importe o arquivo `biblioteca.sql` que contém a estrutura das tabelas.

4. Atualize as configurações de banco de dados no arquivo `includes/database.php`:
    ```php
    $servername = "localhost";
    $username = "seu_usuario";
    $password = "sua_senha";
    $dbname = "biblioteca";
    ```

5. Inicie o servidor PHP:
    ```bash
    php -S localhost:8000
    ```

6. Acesse a aplicação em seu navegador:
    ```
    http://localhost:8000
    ```

## Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues e pull requests para melhorar o projeto.

## Licença

Este projeto está licenciado sob a MIT License. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

