<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Capítulo Certo</title>
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logo.png">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/reset-password.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Nova Senha</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" id="senha1" type="password" name="password" placeholder="Crie uma nova senha" required>
                        <img src="https://i.stack.imgur.com/H9Sb2.png" id="imagem1" class="password-image" alt="Olho para visualização da senha digitada" >
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="senha2" type="password" name="cpassword" placeholder="Confirme a sua senha" required>
                        <img src="https://i.stack.imgur.com/H9Sb2.png" id="imagem2" class="password-image" alt="Olho para visualização da senha digitada">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="change-password" value="Confirmar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>   
        window.onload = function() {
        var senha1 = document.getElementById('senha1');
        var imagem1 = document.getElementById('imagem1');
        var senha2 = document.getElementById('senha2');
        var imagem2 = document.getElementById('imagem2');
    
        imagem1.addEventListener('click', function () {
        senha1.type = senha1.type === 'text' ? 'password' : 'text';
        });
    
        imagem2.addEventListener('click', function () {
        senha2.type = senha2.type === 'text' ? 'password' : 'text';
        });
        }
      </script> 
</body>
</html>
