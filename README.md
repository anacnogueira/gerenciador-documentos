# Gerenciador de Documentos

---

Este projeto é um gerenciador de documentos fácil de usar, desenvolvido com **Laravel 12** e **Laravel Sail**. Ele oferece funcionalidades completas para o gerenciamento de usuários, produtos e documentos, incluindo operações de CRUD (Criar, Ler, Atualizar, Deletar) e download de arquivos.

## Funcionalidades

-   **Cadastro de Usuário**: Permite que novos usuários se registrem na plataforma.
-   **Autenticação de Usuário**: Sistema completo de login e logout para acesso seguro.
-   **Gerenciamento de Produtos**:

    -   Visualizar uma lista de produtos.
    -   Adicionar novos produtos.
    -   Editar informações de produtos existentes.
    -   Remover produtos.

-   **Gerenciamento de Documentos**:
    -   Visualizar uma lista de documentos do usuário.
    -   Adicionar novos documentos.
    -   Editar informações de documentos existentes.
    -   Remover documentos.
    -   Baixar documentos.

## Requisitos

-   **Docker** e **Docker Compose**: Essenciais para rodar o Laravel Sail.

## Instalação e Configuração

Siga os passos abaixo para configurar e executar o projeto em sua máquina local:

1.  **Clone o Repositório:**

    ```bash
    git clone https://github.com/anacnogueira/gerenciador-documentos.git
    cd gerenciador-documentos
    ```

2.  **Copie o Arquivo de Variáveis de Ambiente:**

    ```bash
    cp .env.example .env
    ```

3.  **Instale as Dependências do Composer com Sail:**

    ```bash
    sail composer install
    ```

4.  **Gere a Chave da Aplicação:**

    ```bash
    sail artisan key:generate
    ```

5.  **Configure o Banco de Dados:**

    Certifique-se de que as configurações do banco de dados no arquivo `.env` estejam corretas. Por padrão, o Sail configura um banco de dados MySQL para você.

6.  **Execute as Migrações:**

    ```bash
    sail artisan migrate
    ```

7.  **Crie o Link Simbólico para o Storage:**

    Este passo é **crucial** para que a aplicação possa salvar e acessar os documentos na pasta `storage/app/public`.

    ```bash
    sail artisan storage:link
    ```

8.  **Inicie o Servidor de Desenvolvimento:**

    ```bash
    sail artisan serve
    ```

    O projeto estará acessível em `http://localhost`.

## Configuração de Geolocalização (Opcional)

Este projeto pode usar o endereço IP do usuário para determinar sua localização aproximada (país, cidade, etc.), utilizando o pacote `stevebauman/location` com a base de dados **MaxMind GeoLite2**.

Para habilitar e configurar esta funcionalidade, siga os passos abaixo:

1.  **Obtenha uma Chave de Licença MaxMind:**

    -   Vá para o [site da MaxMind](https://www.maxmind.com/en/geolocations/geoip2-databases).
    -   Crie uma conta gratuita.
    -   Após o login, navegue até "My Account" -> "Manage License Keys" e gere uma nova chave de licença.
    -   Adicione esta chave ao seu arquivo `.env`:

        ```env
        MAXMIND_LICENSE_KEY="SUA_CHAVE_DE_LICENCA_MAXMIND_AQUI"
        ```

2.  **Baixe o Banco de Dados GeoLite2:**

    Este comando baixará o banco de dados necessário para a geolocalização por IP. É importante rodá-lo periodicamente para manter a base de dados atualizada.

    ```bash
    sail artisan location:update --driver=maxmind
    ```

    -   **Recomendação**: Considere agendar este comando no Laravel Scheduler (`app/Console/Kernel.php`) para que ele seja executado automaticamente, por exemplo, uma vez por mês, garantindo que os dados de localização estejam sempre atualizados.

Com esta configuração, você poderá utilizar a funcionalidade de geolocalização no seu código Laravel.

## Uso

Após a instalação e configuração, você pode:

1.  Acessar a URL do projeto no seu navegador.
2.  Registrar um novo usuário ou fazer login com credenciais existentes.
3.  Navegar pelas seções de "Produtos" e "Documentos" para gerenciar seus dados.

---
