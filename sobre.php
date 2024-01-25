<?php require_once "php/controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capítulo Certo</title>
    <link rel="shortcut icon" type="imagex/png" href="imagens/logo.png">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sobre.css">
    <link rel="stylesheet" href="css/style-modal.css">
    <script src="js/script-modal.js" defer></script>
   
</head>

<body>
    <header>
        <div class="logo">
            <a href="home.php">
                <img src="imagens/logo.png" alt="logo" id="logo">
                <span>
                    <h1>Capítulo Certo</h1>
                </span>
            </a>

        </div>
     <nav>   
            <nav>
                <ul class="icones-nav">
                            <li class="icones-filho">
                                <div id="menu" class="menu" data-aberto="false">
                                    <span id="menu-trigger" class="menu-trigger">
                                        <img src="imagens/user.png"></img>
                                    </span>
                                    <ul class="menu-menu">
                                        <li class="menu-user"><?php echo $fetch_info['name'] ?></li>
                                        <li><a class="menu-user" href="php/logout-user.php">Sair</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="icones-filho"><a href="loja.php"><img src="imagens/carrinho.png" alt="Carrinho"></a></li>
                        </ul>
            </nav>
     </nav>  
    </header>
    <main>
        <div class="carrossel">
            <img src="imagens/slbar1 (1).png" alt="Imagem 1">
            <img src="imagens/slbar1 (2).png" alt="Imagem 2">
            <img src="imagens/slbar1 (3).png" alt="Imagem 3">
        </div>
        <script src="js/carrossel.js" defer>carrosel</script>
        <div class="sobre">
            <h1>E-commerce Capitulo Certo</h1>

            <p>Este projeto faz parte do Bootcamp Proz Talento Cloud, com intuito da criação de uma aplicação Utilizando HTML, CSS e Java Script, API Node.Js, PHP e banco de dados (MySQL e MongoDB)
                 o grupo decidiu por realizar a construção de um E-commerce de Livros nomeado: "Capitulo Certo".</p>

            <h2>Dados da Turma</h2>
            <h3>Professor: Alvaro</h3>
            <h3>Grupo: 02</h3>
            </ul>

            <h2>Integrantes</h2>
            <table>
                <thead>
                    <tr>
                        <th>NOME COMPLETO</th>
                        <th>TURMA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Douglas Sadi da Silva</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Igor Sandes</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Leonardo Saconato de Santana</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Leandro Carvalho</td>
                        <td>8</td>
                    </tr>

                </tbody>
            </table>

            <h2>Link do Protótipo do Projeto</h2>
            <p><a href="https://www.canva.com/design/DAFyH3nxRaM/PA0sw7xttyt7-5FvTEnF6A/edit?utm_content=DAFyH3nxRaM&utm_campaign=designshare&utm_medium=link2&utm_source=sharebutton"
                    target="_blank">Protótipo do Projeto</a></p>


            <h2>Etapas do Projeto</h2>
            <div>
                <h2>Sprint-I: Definição do tema e desenvolvimento do Layout do projeto</h2>
                <p>Data entrega: 26/10/2023</p>
                <p>Status: Entregue</p>
            </div>
            <div>
                <h2>Sprint-II: Criação da estrutura HTML das páginas</h2>
                <p>Data entrega: 02/11/2023</p>
                <p>Status: Entregue</p>
            </div>
            <div>
                <h2>Sprint-III: Telas do E-commerce</h2>
                <p>Data entrega: 05/12/2023</p>
                <p>Status: Entregue</p>
            </div>
            <div>
                <h2>Sprint-IV: Validação de Formulários JS</h2>
                <p>Data entrega: 09/01/2024</p>
                <p>Status: Entregue</p>
            </div>
            <div>
                <h2>Sprint-V: Entrega Final do Projeto</h2>
                <p>Data entrega: 25/01/2024</p>
                <p>Status: --</p>
            </div>


            <h2>Projetos utilizados como inspiração</h2>
            <ul class="lista">
                <li class="i-lista"><a href="https://www.amazon.com.br/ref=nav_logo" target="_blank">Amazon</a></li>
                <li class="i-lista"><a href="https://www.saraiva.com.br/" target="_blank">Saraiva</a></li>
            </ul>

            <h2>Outras Observações</h2>
            <p>O grupo optou por dividir o desenvolvimento de cada etapa do projeto, mas todos tiveram participação em
                todas as etapas, assim o grupo definiu quais seriam as etapas e qual pessoa ficaria responsáveis por
                cada tela e/ou funcionalidade:</p>
            <table>
                <thead>
                    <tr>
                        <th>RESPONSÁVEL</th>
                        <th>FUNÇÃO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Douglas Sadi da Silva</td>
                        <td>Popup Sobre o E-commerce</td>
                    </tr>
                    <tr>
                        <td>Igor Sandes</td>
                        <td>Home e Produtos</td>
                    </tr>
                    <tr>
                        <td>Leonardo Saconato de Santana</td>
                        <td>Login & Cadastro</td>
                    </tr>
                    <tr>
                        <td>Leandro Carvalho</td>
                        <td>Carrinho de Compras</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </main>

    <footer id="rodape">
        <span><a href="home.php">CapítuloCerto©</a></span>
        <div class="github">
            <a href="https://github.com/LeonardoSaconato/E-commerce-CapituloCerto" target="_blank">
                <img src="./imagens/github.png" height="45px" alt="Acesse o nosso repositório do github"
                    title="Acesse o nosso repositório do github">
            </a>
        </div>
        <nav>
            <ul class="redes">
                <li><a class="redes-contato" href="https://www.facebook.com/capitulo.certo/" target="_blank"><img src="imagens/facebook.png" alt="facebook"></a></li>
                <li><a class="redes-contato" href="https://www.instagram.com/capitulocerto/" target="_blank"><img src="imagens/instagram.png" alt="instagram"></a>
                </li>
            </ul>
        </nav>
    </footer>
    <script src="js/logout-user"></script>
</body>

</html>