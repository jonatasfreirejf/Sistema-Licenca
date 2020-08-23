# Sistema de Controle de Licença de Software
Esse é um sistema de controle de licença com finalidade de desenvolvedores independentes ou empresas de softwares controlar quais pessoas pode utilizar os seus softwares e quanto tempo.

# Exemplo
Digamos que você desenvolveu software comercial para salão de beleza em Java e quer comercializar, só se você não colocar sem um sistema de validação de usuário, ou seja, um controle de licencimento.
A pessoa que comprar, pode simplesmente tirar uma cópia e revender ou distribuir pela internet e acabar com todo seu trabalho. Basta baixar e instalar em servidor PHP 7.3, configurar o banco de dados, rotas e integrar o seu software com API do sistema de licença.

# Configurações
Na pasta "assets/Config" tem 2 arquivos php, onde você deve configurar os dados de acesso ao banco de dados criado e routes configurar a "BASE", ou seja, qual pasta ele foi instalado dentro no servidor.
Exemplo: Se ele foi instalado em uma pasta chamado "admin", você deve colocar em "BASE" o nome da pasta que é "admin, porque quando chamar "www.seusite.com/admin" ele carregará o sistema dentro dessa rota.



