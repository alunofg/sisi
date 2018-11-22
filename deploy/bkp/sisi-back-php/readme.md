## S.I.S.I

## Laravel 5.5

[The PHP Framework For Web Artisans](https://laravel.com/docs/5.5)

## Pré-requisitos

- Apache
- MySQL Server
- PHP >= 7.1
- Composer
## Documentação

1. [Documentação de Requisições](https://github.com/unifg/sisi-back/blob/develop/documetation/readme.md)
1. [Diagrama do Banco](https://github.com/unifg/sisi-back/blob/develop/documetation/api-sisi.png)

## Instalação

### Ambiente Ubuntu 18.04:

#### Composer:
1. Instale utilizando o comando no bash ``` sudo apt install composer```
1. Para verificar se instalou corretamente digite no bash ``` composer ```

#### Apache:
1. Instale o apache utilizando o comando no bash``` sudo apt install apache2 ```

#### MySQL Server:
1. [Tutorial para instlar MySQL Server](https://www.digitalocean.com/community/tutorials/como-instalar-o-mysql-no-ubuntu-18-04-pt)
1. Crie um novo usuário para acessar o banco acessando o bash e digitando ```sudo mysql```
1. Em seguida digite para criar um novo usário com o nome admin``` CREATE USER 'admin'@'localhost' IDENTIFIED BY 'informe_a_senha_aqui';```
1. Para concender os todos privilégios para o usuário admin digite ``` grant all privileges on *.* to 'admin'@'localhost';``` 

#### Instalar dependências secundárias:

``` sudo apt install -y php php-mysql php-pgsql libapache2-mod-php php-curl php-json php-fpm php-xml php-mbstring php-gd php-intl php-imap ``` 

### Ambiente Windows

#### EM BREVE...


### Inicializando projeto

1. Digite no terminal ``` composer install ``` para instalar as dependências do projeto.
1. Copie o arquivo **.env.example** e crie o um novo arquivo **.env**.
1. Rode o comando  ``` php artisan key:generate ``` para criar a key do projeto no arquivo **.env**.
1. Após isso configure o arquivo **.env** com as informações do banco.
1. Rode o comando ``` php artisan migrate ``` para rodar as migrations e criar as tabelas do banco.
1. Rode ``` php artisan db:seed ``` para popular o banco com instâncias de teste.

### Instalação do Passport

1. Rode o comando ``` php artisan passport:install --force```
1. E verifique a tabela **OauthClients** caso exista dois usuários tudo foi instalado corretamente.
