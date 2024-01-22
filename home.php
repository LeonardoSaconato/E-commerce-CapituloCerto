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
    <link rel="stylesheet" href="css/style-modal.css">
    <script src="js/script-modal.js" defer></script>
    <script src="js/logout.js" defer ></script>
</head>

<body>
    <header>
        <div class="logo">
            <a href="../index.html">
                <img src="imagens/logo.png" alt="logo" id="logo">
                <span>
                    <h1>Capítulo Certo</h1>
                </span>
            </a>

        </div>
        <div class="pesquisa">
            <input type="text" id="buscar" name="buscar" placeholder="Buscar..." onkeyup="pesquisar()">
            <img src="imagens/lupa.png" alt="" id="lupa">
            <script src="js/buscar.js" defer>buscar</script>
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
        <div class="livros">
            <script src="js/livro.js" defer>livros</script>
        </div>

        <div id="modal-container" class="modal-container">
            <div class="modal">
                <button class="fechar" id="fechar">X</button>
                <h1>Bem-vindo à nossa Livraria Capítulo Certo</h1>
                <img class="sobreLivraria" src="imagens/livro1.png" alt="">

                <p><strong>Um refúgio para os amantes da leitura e um oásis</strong> para aqueles que buscam o
                    conhecimento e a imaginação.</p>

                <p><strong>Nossa livraria é mais do que apenas um lugar</strong> onde os livros se alinham nas
                    prateleiras; é um universo de possibilidades que espera ser explorado.</p>

                <span><strong>Visite-nos e permita que as páginas ganhem vida!</strong></span>

            </div>
        </div>

    </main>
    <footer id="rodape">
        <span>CapítuloCerto©</span>
        <a href="sobre.php"><span>Sobre</span></a>
        <nav>
            <ul class="redes">
                <li><a class="redes-contato" href="https://www.facebook.com/capitulo.certo/" target="_blank"><img src="imagens/facebook.png" alt="facebook"></a></li>
                <li><a class="redes-contato" href="https://www.instagram.com/capitulocerto/" target="_blank"><img src="imagens/instagram.png" alt="instagram"></a>
                </li>
            </ul>
        </nav>
    </footer>
</body>

</html>