
# Força do Hábito

Um projeito feito com a intenção de cadastro de usuários e clientes de uma academia.


## Requisitos mínimos
Para que o projeto funcione na sua máquina é necessário ter:
- Composer
- Git
- PHP 8.0^
- MySQL
## Como instalar?

Basta seguir o passo-a-passo abaixo para realizar a instalação

1 Passo: Dê um clone no projeto
```
git clone https://github.com/marcelonralves/forca-do-habito.git
```

2 Passo: Abra o diretório do projeto clonado e execute o comando abaixo para instalar as dependências
```
composer install
```

3 Passo: Caso o projeto não tenha o arquivo .env, renomeie o arquivo .env.example para .env

4 Passo: Crie um banco de dados e após isso, vá até o arquivo .env e configure os dados do seu banco de dados.

Esses são os campos no arquivo .env que você irá editar
```
DB_DATABASE=NOME BANCO DE DADOS
DB_USERNAME=USUÁRIO DO BANCO DE DADOS
DB_PASSWORD=SENHA BANCO DE DADOS
```

5 Passo: Execute o comando abaixo para executar as migrations e os seeders.

```
php artisan migrate:fresh --seed  
```

6 Passo: Execute o comando abaixo para gerar a chave de criptografia que o Laravel pede
```
php artisan key:generate
```

7 Passo: Execute o comando para rodar o servidor

Se for utilizar o servidor imbutido do PHP, basta executar:
```
php -S localhost:8000 -t public
```
ou pode utilizar o do próprio artisan
```
php artisan serve
```

8 Passo: Acesse o link que foi fornecido pelo servidor e irá aparecer a tela de login. Deixei definido o seguinte usuário para teste
```
Usuário: test@test.com.br
Senha: 1234
```

E agora é só testar!
## Screenshots

Login
![App Screenshot](https://i.imgur.com/carGsBk.png)
Tela dashboard (obs: os gráficos só aparecem quando tem clientes cadastrados)
![App Screenshot](https://i.imgur.com/1TTgBlm.png)
Gif mostrando algumas páginas do sistema
![App Screenshot](https://i.imgur.com/yBOZi8x.gif)
## Informações extras!
Resolvi deixar um pouco mais dinâmico o projeto, no arquivo .env tem um campo escrito
```
APP_NAME=
```
Basta alterar esse campo um nome qualquer para que o projeto fique adaptado para academias de outros nomes

Ex:
```
APP_NAME="Academia Força Total"
```

Qualquer dúvida basta entrar em contato via email/LinkedIn que estão na minha página inicial do GitHub!
