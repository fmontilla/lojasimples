Loja Simples

Loja simples desenvolvida em Laravel + Vue.js.

Ao rodar esse projeto, será possível aderir a produtos cadastrados previamente no sistema, fazer uma busca por produto específico, visualizar detalhes do produto ao clicar no produto desejado, e acompanhar os pedidos realizados.
O layout desse projeto foi utilizado Vue com Vuex + Vuetify;
A estrutura da API foi desenvolvida camadas para se tratar melhor os dados, onde o Controller só recebe os dados e envia para uma classe de Service para tomar as decisões.
Na Service é feito o envio dos dados para realizar Validação em suas devidas classes de Validações, enviado dados para classes de Repository para se interagir com banco de dados, e após tudo ser salvo no banco de dados, é devolvido para a interface através da API a resposta de sucesso, ou os dados solicitados caso seja uma requisição do tipo GET.

Para rodar esse projeto, é necessário ter intalado:
- Git;
- Composer;
- PHP 7.1 >;
- Node;
- Mysql;

Instalação

- git clone git@github.com:fmontilla/lojasimples.git
- Entrar na pasta do projeto via terminal e dar permissão 777 para a pasta storage
- Entrar na pasta do projeto via terminal e rodar o comando composer install
- Configurar no arquivo .env os dados de conexão ao banco de dados
- Rodar o comando no terminal php artisan migrate --seed
- Rodar o comando no terminal yarn install ou npm install
- Rodar o comando no terminal npm run dev ou yarn watch
