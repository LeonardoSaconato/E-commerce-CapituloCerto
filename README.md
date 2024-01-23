# E-commerce Capitulo Certo
Este repositório servirá para armazenar os códigos-fonte utilizados no projeto, bem como o endereço da aplicação na Web. Este projeto faz parte do Bootcamp Proz Talento Cloud, com intuito da criação de uma aplicação Utilizando HTML, CSS e Java Script, API Node.Js, PHP e banco de dados (MySQL e MongoDB) o grupo decidiu por realizar a construção de um E-commerce de Livros nomeado: "Capitulo Certo".

## Dados da Turma
* **Dia da semana:** Terça-Feira e Quinta-feira
* **Período:** Noturno
**Professor:** Alvaro

## Integrantes
 | NOME COMPLETO                                     | TURMA |
 |---------------------------------------------------|-------|
 | Douglas Sadi da Silva                             |   8   |
 | Igor Sandes                                       |   8   |  
 | Leandro dos Remédios Campos                       |   8   |
 | Leandro Carvalho                                  |   8   |
 | Leonardo Saconato de Santana                      |   8   |
 | Manoel Elias                                      |   8   |


## Link do Prototípo do Projeto

* https://www.canva.com/design/DAFyH3nxRaM/PA0sw7xttyt7-5FvTEnF6A/edit?utm_content=DAFyH3nxRaM&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton


## Descrição do Projeto

Este é um projeto de TCC de curso, onde criamos a nossa livraria "Capítulo Certo" e elaboramos um E-commerce com as linguagens e tecnologias citadas acima.
“Aqui, acreditamos no poder transformador dos livros. Eles nos transportam para novos mundos, nos ensinam sobre o universo e nos inspiram a ser melhores. Os livros são janelas para a alma, espelhos que refletem nossas emoções e desejos.”

## Etapas do Projeto

**Sprint-I: Definição do tema e desenvolvimento do Layout do projeto**
* Data entrega: 26/10/2023
* Status: Entregue

**Sprint-II: Criação da estrutura HTML das páginas**
* Data entrega: 02/11/2023
* Status: Entregue

**Sprint-III: Telas do E-commerce**
* Data entrega: 05/12/2023
* Status: Entregue

**Sprint-IV: Validação de Formulários JS**
* Data entrega: 09/01/2024
* Status: Entregue

**Sprint-V: Banco de dados**
* Data entrega: 18/01/2024
* Status: Entregue

**Entrega Final do Projeto**
* Data entrega: 25/01/2024
* Status: --

## Endereço da aplicação

http://capitulocerto.ddns.net/

Também hospedamos na 000webhostapp:

https://capitulocerto.000webhostapp.com/

* Devido as limitações da hospedagem 000webhost, as funções de cadastro e "esqueci a senha" não estão enviando o email do codígo de confirmação de email ou reset da senha, para testes do E-commerce utilize o login que está no arquivo "UserTestLogin"


## Projetos utilizados como inspiração

* https://www.amazon.com.br/ref=nav_logo
* https://www.saraiva.com.br/

## Outras Observações

O grupo optou por dividir o desenvolvimento de cada etapa do projeto, mas todos tiveram participação em todas as etapas, assim o grupo definiu quais seriam as etapas e qual pessoa ficaria responsáveis por cada tela e/ou funcionalidade:

|     RESPONSÁVEL                   |                   FUNÇÃO                        |
|-----------------------------------|-------------------------------------------------|
|  Manoel Elias                     |Elaboração da Pagína 1 - Popup Sobre o E-commerce|
|  Igor Sandes                      |Elaboração da Pagína 2 - Home e Produtos         |
|  Leonardo Saconato                |Elaboração da Pagína 3 - Login & Cadastro        |
|  Leandro Carvalho                 |Elaboração da Pagína 4 - Carrinho de Compras     |
|  Douglas Sadi e Leandro Campos    |Elaboração da Pagína 5 - Detalhes sobre os livros|


## Banco de Dados - MER/DER/SQL
No video abaixo, documentamos o processo de modelagem, criação do banco de dados e linguagem SQL para demonstração prática:

[Vídeo Sprint V - Banco de Dados - Capítulo Certo](https://www.youtube.com/watch?v=bbfYkefq320)

Nesta primeira etapa, demonstraremos a nossa modelagem entidade relacionamento.

## INTRODUÇÃO

Esta modelagem, tem como objetivo, apresentar de forma visual, o funcionamento de nosso e-commerce e contribuir para a análise das construções e normalizações das tabelas.
<img src="/assets/Capitulo-Certo-MER.png">

Começaremos pelas cardinalidades e relacionamentos entre elas:

## Livro x Estoque

Na tabela livro, todas as colunas são provenientes das nossas páginas em html.

Sua relação com a tabela estoque, consiste em... Na cardinalidade mínima, consideramos o número zero, na ocasião do livro acabar em nosso estoque e o número um, é em relação ao espaço físico:
<img src="/assets/Livro-Estoque.png">

Cada livro terá sua quantidade e prateleira, como podemos ver na tabela estoque, assim, facilitando a sua localização ao separá-los para os pedidos dos clientes.

**Para sabermos qual é o livro, a tabela estoque recebe uma coluna com a chave estrangeira da tabela livro.**
<img src="/assets/Tabela-Livro-Estoque-Select-Estoque.png">

## Cliente x Login

Na tabela cliente, temos alguns campos comuns no que diz respeito ao cadastro do mesmo, porém, o campo telefone é multivalorado… neste caso, este campo gerará uma nova tabela, recebendo o id do cliente como chave estrangeira, desta forma, podemos cadastrar quantos números quisermos para cada cliente.
<img src="/assets/Tabela-Cliente-Telefone-Select.png">

Para a tabela login, teremos o id do cliente como chave estrangeira e as informações referentes ao login… para evitarmos o armazenamento das senhas e código de verificação em texto claro, usaremos o recurso MD5 fornecido pelo postgre:

**Informando o parâmetro MD5 antes do valor a ser adicionado, quando o insert for realizado, usará um MD5 de 32 bits:.**

```
INSERT INTO login (fk_id_cliente, email, senha_hash, status_login, cod_verif_email_hash)
VALUES
(1, 'ana.silva@email.com', MD5('senha_ana_silva'), TRUE, MD5('verif_ana_silva')),
(2, 'carlos.oliveira@email.com', MD5('senha_carlos_oliveira'), FALSE, MD5('verif_carlos_oliveira')),
(3, 'mariana.santos@email.com', MD5('senha_mariana_santos'), FALSE, MD5('verif_mariana_santos')),
(4, 'rafael.pereira@email.com', MD5('senha_rafael_pereira'), TRUE, MD5('verif_rafael_pereira')),
(5, 'juliana.lima@email.com', MD5('senha_juliana_lima'), TRUE, MD5('verif_juliana_lima')),
(6, 'diego.oliveira@email.com', MD5('senha_diego_oliveira'), TRUE, MD5('verif_diego_oliveira')),
(7, 'camila.souza@email.com', MD5('senha_camila_souza'), FALSE, MD5('verif_camila_souza')),
(8, 'lucas.pereira@email.com', MD5('senha_lucas_pereira'), FALSE, MD5('verif_lucas_pereira')),
(9, 'fernanda.santos@email.com', MD5('senha_fernanda_santos'), TRUE, MD5('verif_fernanda_santos')),
(10, 'jose.oliveira@email.com', MD5('senha_jose_oliveira'), FALSE, MD5('verif_jose_oliveira'));
```
```
select * from login;
```
<img src="/assets/Select-Login-MD5.png">

A relação entre login e cliente é de 1 para 1, já que o cliente precisa de pelo menos um login e no máximo 1. Caso ele esqueça a senha, haverá um método de recuperação… assim como um login não pode existir sem um cliente e cada cliente tem o seu login individual.

## Cliente x Livro

No relacionamento entre as tabelas cliente e livro, é onde ocorre o processo de compra. Para a nossa regra de negócio, estamos considerando que o cliente compre pelo menos um livro, porém ele pode comprar vários livros, assim como um livro pode ser comprado por apenas um cliente, ou vários, desde que tenhamos em estoque:

<img src="/assets/Pedido.png">

Sendo assim, temos uma relação N para M, necessitando de uma tabela auxiliar, que no caso, optamos por nomeá-la como pedido, afim de facilitar sua representação:

<img src="/assets/Tabela-Estoque-Livro-Pedido-Cliente.png">

Nesta nova tabela, teremos o id do pedido, a data da compra, as devidas chaves estrangeiras, a quantidade comprada pelo cliente e o valor total:

<img src="/assets/Tabela-Pedido-Select.png">
