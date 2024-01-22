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

**Sprint-V: Banco de Dados**
* Data entrega: 18/01/2024
* Status: Entregue

**Entrega Final do Projeto**
* Data entrega: 25/01/2024
* Status: --

## Endereço da aplicação

https://capitulocerto.000webhostapp.com/

* Devido as limitações da hospedagem, as funções de cadastro e "esqueci a senha" não estão enviando o email do codígo de confirmação de email ou reset da senha, para testes do E-commerce utilize o login que está no arquivo "UserTestLogin"


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

Esta modelagem, tem como objetivo, apresentar de forma visual, o funcionamento de nosso e-commerce e contribuir para a análise das construções e normalizações das tabelas:
<img src="/assets/Capitulo-Certo-MER.png">

Começaremos pelas cardinalidades e relacionamentos entre elas:

## Livro x Estoque

Na tabela livro, todas as colunas são provenientes das nossas páginas em html.

Sua relação com a tabela estoque, consiste em... Na cardinalidade mínima, consideramos o número zero, na ocasião do livro acabar em nosso estoque e o número um, é em relação ao espaço físico:
<img src="/assets/Livro-Estoque.png">

Cada livro terá sua quantidade e prateleira, como podemos ver na tabela estoque, assim, facilitando a sua localização ao separá-los para os pedidos dos clientes.

**Para sabermos qual é o livro, a tabela estoque recebe uma coluna com a chave estrangeira da tabela livro:**
<img src="/assets/Tabela-Livro-Estoque-Select-Estoque.png">

## Cliente x Login

Na tabela cliente, temos alguns campos comuns no que diz respeito ao cadastro do mesmo, porém, o campo telefone é multivalorado… neste caso, este campo gerará uma nova tabela, recebendo o id do cliente como chave estrangeira, desta forma, podemos cadastrar quantos números quisermos para cada cliente:
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

## S.Q.L

**Script para criação da tabelas, constraints, inserts e a procedure para o processo de compra:**

Testado e compatível com o [SQL Online Compiler](https://sqliteonline.com/)

<img src="/assets/SQL-Online-CapituloCerto.png">

## Script Principal

```
----------------------------CRIAÇÃO TABELAS----------------------------------------
CREATE TABLE livro 
(
    id SERIAL PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	autor VARCHAR(100) NOT NULL,
    valor FLOAT NOT NULL,
    paginas INT NOT NULL,
	genero VARCHAR(50),
    edicao INT NOT NULL,
    versao VARCHAR(20) NOT NULL,
    isbn VARCHAR(20)
);

CREATE TABLE estoque 
(
    id SERIAL PRIMARY KEY,
	fk_id_livro INT NOT NULL,
	quantidade INT NOT NULL,
	prateleira INT NOT NULL,
	CONSTRAINT fk_livro FOREIGN KEY (fk_id_livro) REFERENCES livro (id)
);

CREATE TABLE cliente 
(
    id SERIAL PRIMARY KEY,
	nome VARCHAR(100) NOT NULL,
	rg VARCHAR(15) NOT NULL,
    cpf VARCHAR(15) NOT NULL,
    nascimento DATE NOT NULL,
	endereco VARCHAR(100)NOT NULL
);

CREATE TABLE telefone 
(
    id SERIAL PRIMARY KEY,
	fk_id_cliente INT NOT NULL,
    telefone VARCHAR(15) NOT NULL,
	tipo VARCHAR(30),
	CONSTRAINT fk_cliente FOREIGN KEY (fk_id_cliente) REFERENCES cliente (id)
);

CREATE TABLE login 
(
	id SERIAL PRIMARY KEY,
	fk_id_cliente INT NOT NULL,
	email VARCHAR(50) NOT NULL,
	senha_hash VARCHAR(255) NOT NULL,
	status_login BOOLEAN NOT NULL,
	cod_verif_email_hash VARCHAR(255),
	CONSTRAINT fk_cliente FOREIGN KEY (fk_id_cliente) REFERENCES cliente (id)
);

CREATE TABLE pedido 
(
    id SERIAL PRIMARY KEY,
	data_compra TIMESTAMP NOT NULL,
	fk_id_cliente INT NOT NULL,
	fk_id_livro INT NOT NULL,
	quantidade  INT NOT NULL,
	valor_compra FLOAT NOT NULL,
	CONSTRAINT fk_cliente FOREIGN KEY (fk_id_cliente) REFERENCES cliente (id),
	CONSTRAINT fk_livro FOREIGN KEY (fk_id_livro) REFERENCES livro (id)
);
---------------------------------------------------------------------------------
----------------------------INSERT LIVROS----------------------------------------
INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('Análise de Tráfego em Redes TCP/IP', 'João Eriberto Mota Filho', 
86.49, 416, 'Redes', 1, 'Português', '978-8575223758');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('Código Limpo: Habilidades Práticas', 'Robert C. Martin', 
100.00, 425, 'Metodologias de Software', 1, 'Português', '978-8576082675');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('HTML5 e CSS3: Guia Prático e Visual', 'Elizabeth Castro, Bruce Hyslop', 
113.73, 416, 'Programação Frontend', 7, 'Português', '978-8576088035');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('Introdução à Programação com Python', 'Nilo Ney Coutinho Menezes', 
66.75, 328, 'Programação', 1, 'Português', '978-8575227183');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('Java: Como Programar', ' Paul Deitel, Harvey Deitel', 
270.49, 1176, 'Programação', 8, 'Português', '978-8576055631');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('Redes de Computadores', ' Andrew Tanenbaum', 
205.63, 624, 'Redes', 6, 'Português', '978-8582605608');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('Sistemas Operacionais Modernos', ' Andrew Tanenbaum', 
279.99, 864, 'Sistemas Operacionais', 4, 'Português', '978-8543005676');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('SQL Para Leigos', 'Allen G. Taylor', 
92.40, 480, 'Banco de Dados', 8, 'Português', '978-8576089674');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('Técnicas de Invasão', 'Bruno Fraga', 
49.73, 296, 'Hacking', 1, 'Português', '978-6550440183');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('Use a cabeça! PHP e MySQL', 'Lynn Beighley', 
59.99, 808, 'Programação e Banco de Dados', 1, 'Português', '978-8576085027');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('1984', 'George Orwell', 
78.90, 325, 'Ficção Utópica e Distópica', 1, 'Português', '978-8576082675');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('A Culpa É das Estrelas', 'John Green', 
32.40, 127, 'Romance', 8, 'Português', '978-8576089674');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('A Revolução dos Bichos', 'George Orwell', 
59.99, 208, 'Alegoria, Sátira, Fábula, Novela, Política, Ficção', 
1, 'Português', '978-8576085027');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('Cem Anos de Solidão', 'Gabriel García Márquez', 
66.75, 328, 'Romance, Realismo, Fantasia, Saga, Ficção', 1, 'Português', '978-8575227183');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('Dom Quixote', 'Miguel de Cervantes', 
46.49, 416, 'Romance, Paródia, Sátira, Farsa', 1, 'Português', '978-8575223758');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('Harry Potter e a Pedra Filosofal', 'JK Rowling', 
87.00, 476, 'Romance, Literatura Infantil, Fantástica, Fantasia', 
8, 'Português', '978-8576055631');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('O Apanhador no Campo de Centeio', 'JD Salinger', 
64.90, 324, 'Romance, Ficção Juvenil, Realismo Literário', 6, 'Português', '978-8582605608');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('O Grande Gatsby', 'Francis Scott Key Fitzgerald', 
53.57, 276, 'Romance, Ficção, Tragédia', 7, 'Português', '978-8576088035');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 
49.73, 196, 'Literatura Infantil, Fábula, Novela, Ficção', 
1, 'Português', '978-6550440183');

INSERT INTO livro (nome, autor, valor, paginas, genero, edicao, versao, isbn)
VALUES
('O Senhor dos Anéis: A Sociedade do Anel', 'J.R.R Tolkien', 
179.99, 864, 'Romance, Literatura, Fantástica, Alta Fantasia', 
4, 'Português', '978-8543005676');
------------------------------------------------------------------------------------------
----------------------------INSERT ESTOQUE-----------------------------------------------
INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (1,100,1);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (2,100,2);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (3,100,3);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (4,100,4);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (5,100,5);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (6,100,6);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (7,100,7);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (8,100,8);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (9,100,9);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (10,100,10);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (11,100,11);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (12,100,12);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (13,100,13);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (14,100,14);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (15,100,15);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (16,100,16);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (17,100,17);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (18,100,18);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (19,100,19);

INSERT INTO estoque (fk_id_livro, quantidade, prateleira)
VALUES (20,100,20);
------------------------------------------------------------------------------------------
----------------------------INSERT CLIENTES-----------------------------------------------
INSERT INTO cliente (nome, rg, cpf, nascimento, endereco) 
VALUES 
('Ana Silva', '123456789', '98765432101', '1990-05-15', 'Rua das Flores, 123');

INSERT INTO cliente (nome, rg, cpf, nascimento, endereco) 
VALUES 
('Carlos Oliveira', '987654321', '12345678901', '1985-08-20', 'Avenida Principal, 456');

INSERT INTO cliente (nome, rg, cpf, nascimento, endereco) 
VALUES 
('Mariana Santos', '567890123', '01234567890', '2002-03-10', 'Travessa da Esperança, 789');

INSERT INTO cliente (nome, rg, cpf, nascimento, endereco) 
VALUES 
('Rafael Pereira', '345678901', '89012345678', '1982-11-25', 'Alameda dos Sonhos, 321');

INSERT INTO cliente (nome, rg, cpf, nascimento, endereco) 
VALUES 
('Juliana Lima', '789012345', '34567890123', '1995-07-08', 'Praça da Liberdade, 654');

INSERT INTO cliente (nome, rg, cpf, nascimento, endereco) 
VALUES 
('Diego Oliveira', '234567890', '89012345601', '1988-12-18', 'Rua do Comércio, 987');

INSERT INTO cliente (nome, rg, cpf, nascimento, endereco) 
VALUES 
('Camila Souza', '890123456', '23456789012', '1998-02-28', 'Avenida Central, 147');

INSERT INTO cliente (nome, rg, cpf, nascimento, endereco) 
VALUES 
('Lucas Pereira', '456789012', '45678901234', '1977-09-05', 'Rua das Estrelas, 258');

INSERT INTO cliente (nome, rg, cpf, nascimento, endereco) 
VALUES 
('Fernanda Santos', '012345678', '56789012345', '2000-06-12', 'Travessa dos Desejos, 369');

INSERT INTO cliente (nome, rg, cpf, nascimento, endereco) 
VALUES 
('José Oliveira', '678901234', '67890123456', '1980-04-30', 'Praça da Harmonia, 741');
------------------------------------------------------------------------------------------
----------------------------INSERT TELEFONES----------------------------------------------
-- Cliente 1
-- Celular
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (1, '999999999', 'Celular');
-- Residencial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (1, '222222222', 'Residencial');
-- Comercial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (1, '333333333', 'Comercial');
-- Recado
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (1, '444444444', 'Recado - Mariane');

-- Cliente 2
-- Celular
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (2, '777777777', 'Celular');
-- Residencial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (2, '555555555', 'Residencial');
-- Comercial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (2, '666666666', 'Comercial');
-- Recado
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (2, '888888888', 'Recado - Lucas');

-- Cliente 3
-- Celular
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (3, '111111111', 'Celular');
-- Residencial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (3, '999999999', 'Residencial');
-- Comercial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (3, '888888888', 'Comercial');
-- Recado
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (3, '777777777', 'Recado - Juliana');

-- Cliente 4
-- Celular
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (4, '123456789', 'Celular');
-- Residencial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (4, '987654321', 'Residencial');
-- Comercial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (4, '111222333', 'Comercial');
-- Recado
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (4, '444555666', 'Recado - Pedro');

-- Cliente 5
-- Celular
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (5, '999888777', 'Celular');
-- Residencial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (5, '666777888', 'Residencial');
-- Comercial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (5, '333444555', 'Comercial');
-- Recado
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (5, '111222333', 'Recado - Isabela');

-- Cliente 6
-- Celular
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (6, '555666777', 'Celular');
-- Residencial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (6, '888999000', 'Residencial');
-- Comercial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (6, '111222333', 'Comercial');
-- Recado
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (6, '444555666', 'Recado - Luiz');

-- Cliente 7
-- Celular
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (7, '111222333', 'Celular');
-- Residencial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (7, '444555666', 'Residencial');
-- Comercial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (7, '888999000', 'Comercial');
-- Recado
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (7, '555666777', 'Recado - Gabriela');

-- Cliente 8
-- Celular
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (8, '888999000', 'Celular');
-- Residencial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (8, '555666777', 'Residencial');
-- Comercial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (8, '111222333', 'Comercial');
-- Recado
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (8, '444555666', 'Recado - Eduardo');

-- Cliente 9
-- Celular
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (9, '444555666', 'Celular');
-- Residencial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (9, '888999000', 'Residencial');
-- Comercial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (9, '111222333', 'Comercial');
-- Recado
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (9, '555666777', 'Recado - Sofia');

-- Cliente 10
-- Celular
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (10, '555666777', 'Celular');
-- Residencial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (10, '888999000', 'Residencial');
-- Comercial
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (10, '111222333', 'Comercial');
-- Recado
INSERT INTO telefone (fk_id_cliente, telefone, tipo)
VALUES (10, '444555666', 'Recado - Beatriz');
------------------------------------------------------------------------------------------
----------------------------INSERT LOGIN--------------------------------------------------
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
------------------------------------------------------------------------------------------
----------------------------PROCEDURE realizar_pedido-------------------------------------
--call realizar_pedido(x,y,z);------------------------------------------------------------
--Registra compra na tabela pedido e atualiza estoque.------------------------------------
--Caso não tenha estoque, não realiza-----------------------------------------------------
--Onde: x = id cliente--------------------------------------------------------------------
--y = id livro----------------------------------------------------------------------------
--z = quantidade--------------------------------------------------------------------------
CREATE OR REPLACE PROCEDURE realizar_pedido(
    in_cliente_id INTEGER,
    in_livro_id INTEGER,
    in_quantidade INTEGER
)
LANGUAGE plpgsql
AS $$
DECLARE
    livro_quantidade_atual INTEGER;
    livro_valor FLOAT;
    pedido_valor_total FLOAT;
BEGIN
    -- Verificar a quantidade disponível do livro no estoque
    SELECT quantidade, valor INTO livro_quantidade_atual, livro_valor
    FROM estoque
    JOIN livro ON estoque.fk_id_livro = livro.id
    WHERE livro.id = in_livro_id;

    -- Verificar se há estoque suficiente
    IF livro_quantidade_atual >= in_quantidade THEN
        -- Calcular o valor total do pedido
        pedido_valor_total := livro_valor * in_quantidade;

        -- Inserir o pedido na tabela pedido com timestamp atual sem milissegundos e valor_compra
        INSERT INTO pedido (data_compra, fk_id_cliente, fk_id_livro, quantidade, valor_compra)
        VALUES (
            TO_TIMESTAMP(TO_CHAR(NOW(), 'YYYY-MM-DD HH24:MI:SS'), 'YYYY-MM-DD HH24:MI:SS'), 
            in_cliente_id, in_livro_id, in_quantidade, pedido_valor_total
        );

        -- Atualizar a quantidade disponível do livro no estoque
        UPDATE estoque
        SET quantidade = quantidade - in_quantidade
        WHERE fk_id_livro = in_livro_id;

        COMMIT;
        RAISE NOTICE 'Pedido realizado com sucesso!';
    ELSE
        RAISE EXCEPTION 'Quantidade insuficiente em estoque';
    END IF;
END;
$$;
----------------------------FIM PROCEDURE ---------------------------------------------
```
## Script Queries de Exemplo:

**OBS: No SQL-Online, os comandos call realizar_pedido(x,y,z); precisam ser executados um à um, caso queira testar o exemplo que deixamos aqui:**

```
------SELEÇÕES BÁSICAS-------------------------------------------------
select * from livro;
select * from cliente;
select * from cliente where id = 1;
select * from telefone where fk_id_cliente  = 1;
select * from login;
-----------------------------------------------------------------------
---SELECIONANDO CLIENTE COM O SEU TIPO DE TELEFONE --------------------
-- ILIKE = REMOVE O CASE SENSITIVE ------------------------------------
SELECT cliente.*, telefone.telefone, telefone.tipo 
FROM cliente
JOIN telefone ON cliente.id = telefone.fk_id_cliente
WHERE cliente.id = 1 AND telefone.tipo ILIKE '%rec%';
-----------RETORNANDO TODOS OS NÚMEROS DE UM CLIENTE ESPECIFICO--------
SELECT cliente.nome as cliente, telefone.telefone, telefone.tipo 
FROM telefone
JOIN cliente ON telefone.fk_id_cliente = cliente.id 
where cliente.id = 10;
---------------------ESTOQUE-------------------------------------------
select * from estoque order by id asc;
-----------------------------------------------------------------------
--SELECIONANDO LIVROS NO ESTOQUE COM JOIN PARA MOSTRAR O NOME--
--MANTENDO A ORDEM DE EXIBIÇÃO PELO ID DE FORMA ASCENDENTE---
SELECT livro.id as livro, livro.nome as titulo, livro.valor, 
estoque.prateleira, estoque.quantidade 
FROM estoque
JOIN livro ON fk_id_livro = livro.id order by livro.id asc;
---------------------PEDIDO-------------------------------------------
select * from pedido;
------------SIMULANDO COMPRA MAIOR QUE O ESTOQUE-----------------------
call realizar_pedido(1,1,200);
--CHAMANDO PROCEDURE (id_cliente, id_livro, quantidade-----------------
call realizar_pedido(1,1,10);
call realizar_pedido(1,2,10);
call realizar_pedido(2,3,10);
call realizar_pedido(2,4,10);
call realizar_pedido(3,5,10);
call realizar_pedido(3,6,10);
call realizar_pedido(4,7,10);
call realizar_pedido(4,8,10);
call realizar_pedido(5,9,10);
call realizar_pedido(5,10,10);
call realizar_pedido(6,11,10);
call realizar_pedido(6,12,10);
call realizar_pedido(7,13,10);
call realizar_pedido(7,14,10);
call realizar_pedido(8,15,10);
call realizar_pedido(8,16,10);
call realizar_pedido(9,17,10);
call realizar_pedido(9,18,10);
call realizar_pedido(10,19,10);
call realizar_pedido(10,20,10);
--PROJETANDO SELECT ORDENANDO PELO ID CLIENTE ASCENDENTE-----------------
select
    cliente.nome as nome_cliente,
    pedido.data_compra,
    livro.nome as nome_livro,
	livro.valor  as valor_und,
    pedido.quantidade,
    pedido.valor_compra
FROM
    pedido
JOIN
    cliente ON pedido.fk_id_cliente = cliente.id
JOIN
    livro ON pedido.fk_id_livro = livro.id
order by fk_id_cliente asc;
-----------------------------------------------------------------------
-----SELECIONANDO NA TABELA PEDIDO E MOSTRANDO O ID DO CLIENTE---------
select fk_id_cliente as id_cliente, cliente.nome as nome_cliente, 
pedido.data_compra,livro.nome as nome_livro,
livro.valor as valor_und,pedido.quantidade,pedido.valor_compra
from pedido join cliente ON pedido.fk_id_cliente = cliente.id
join livro ON pedido.fk_id_livro = livro.id
order by fk_id_cliente asc;
-----DELETANDO OS PEDIDOS DO CLIENTE COM ID 1 -------------------------
delete from pedido where fk_id_cliente = 1;
-----------------------------------------------------------------------
```
🙏 Esperamos que tenham gostado do nosso projeto e agradecemos pela atenção :) 🙏
