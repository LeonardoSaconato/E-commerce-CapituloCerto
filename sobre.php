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
    <link rel="shortcut icon" type="imagex/png" href="imagens/logo.png"> 
    <link rel="stylesheet" href="css/sobre.css">
    <link rel="stylesheet" href="css/style-modal.css">
    <script src="js/script-modal.js" defer></script>
    <script src="js/carrossel.js" defer>carrosel</script>    
    <title>Capitulo Certo</title>
</head>
<body>
    <header>
        <div class="logo">
            <a href="home.php" alt = "home"><img src="imagens/logo.png" alt="logo" id="logo"></a>
            <span><h1>Capítulo Certo</h1></span>
        </div>
    </header>
    <nav>
        <div class="carrossel">
            <img src="imagens/slbar1 (1).png" alt="Imagem 1">
            <img src="imagens/slbar1 (2).png" alt="Imagem 2">
            <img src="imagens/slbar1 (3).png" alt="Imagem 3">
        </div>
    </nav>
    <main>
        <div class = "sobre">
            <h1>Sobre Nós</h1>
            <h2>Quem Somos:</h2>
            <span>
                <p>Somos uma empresa produtora de conhecimento com uma perspectiva única, que combina o projeto editorial com uma abordagem educacional.</p>
            </span>
            <span>
                <p>Nossa atuação divide-se em <strong><ins>três principais áreas:</ins></strong></p>
                    <ul>
                        <li>Editora</li>
                        <li>Livraria</li>
                        <li>Espaço Cultural</li>
                    </ul>
            </span>
            <span>
                <p>Unimos diferentes aspectos da vida intelectual: <strong>Cultura, Tecnologia, Ciência e Inovação</strong>.</p>    <p>Oferecemos aos nossos clientes, a oportunidade de explorar o que há de melhor produzido nessas áreas do conhecimento humano ao longo de diferentes épocas e locais ao redor do mundo.</p>
            </span>
            <span>
                <p>Nosso compromisso com a cultura se reflete na promoção de cursos, palestras e eventos de excelência, buscando sempre oferecer uma qualidade superior.</p>
            </span>
        </div>
    </main>
    <footer>
        <a href="home.php"><span>CapítuloCerto@</span></a>
        <a href="loja.php"><span>Loja</span></a>
            <nav>
                 <a class="redes-contato redes" href="https://www.facebook.com/capitulo.certo/" target="_blank" rel="noopener"><img src="./imagens/facebook.png"alt="facebook"></a>

                 <a class="redes-contato redes" href="https://www.instagram.com/capitulocerto/" target="_blank" rel="noopener"><img src="./imagens/instagram.png" alt="instagram"></a></
            </nav>
    </footer>
</body>
</html>