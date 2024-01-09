<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capítulo Certo</title>
    <link rel="shortcut icon" type="imagex/png" href="../imagens/logo.png"> 
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link  rel="stylesheet"href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
</head>
<body>
    <div class="main-login">
            <div class="left-login">
                <h2 class="title-login">Faça Login</h2>
                <p> A magia da leitura aguarda você, basta pegar um livro e começar essa jornada emocionante!</p>
                <img src="../imagens/animacao-login-signup.svg" class="left-login-image" alt="Animação pessoa lendo um livro">
            </div>
            <div class="right-login">
                <div class="card-login">
                <div class="wrapper">
                    <div class="title-text">
                    <div class="title login">Login</div>
                    <div class="title signup">Cadastro</div>
                    </div>
                    <div class="form-container">
                    <div class="slide-controls">
                        <input type="radio" name="slide" id="login" checked>
                        <input type="radio" name="slide" id="signup">
                        <label for="login" class="slide login">Login</label>
                        <label for="signup" class="slide signup">Cadastre-se</label>
                        <div class="slider-tab"></div>
                       
                    
                    </div>
                    <div class="form-inner">
                        <form action="login-user.php" class="login" method="POST" autocomplete="">
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
							<div class="field">
								<input type="text" id="email" name = "email" placeholder="Email" required value="<?php echo $email ?>">
                                <p id="email-helper" class="helper-text"></p>
							</div>
							<div class="field pass">
								<input type="password" id="login_pass" name="password" placeholder="Senha" required>
                                <img src="https://i.stack.imgur.com/H9Sb2.png" alt="Olho para visualização da senha digitada" class="password-image">
							</div>
							<div class="pass-link"><a href="forgot-password.php">Esqueceu sua senha?</a></div>
							<div class="field btn">
								<div class="btn-layer"></div>
								<input type="submit" name="login" value="Login">
							</div>
							<div class="signup-link">Não tem cadastro? <a href="signup-user.php">Cadastre se aqui</a></div>
                        </form>

                        
                        <form action="signup-user.php" method="POST" autocomplete="" class="signup" id="cadastro">
                        <?php require_once "controllerUserData.php"; ?>
                        <?php
                            if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                         }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
							<div class="field">
								<input type="text" id="name" name="name" placeholder="Digite seu Nome" required value="<?php echo $name ?>">
                                <p id="username-helper" class="helper-text"></p>
							</div>
							<div class="field">
								<input type="text"  id="emaill" name="email" placeholder="Digite seu Email" required value="<?php echo $email ?>">
                                <p id="emaill-helper" class="helper-text"></p>
							</div>
							<div class="field pass">
								<input type="password" id="pass" type="password" name="password" placeholder="Digite a senha" required>
                                <img src="https://i.stack.imgur.com/H9Sb2.png" alt="Olho para visualização da senha digitada" class="password-image">
                                <p id="senha-helper" class="helper-text"></p>
							</div>
							 <div class="field pass">
								<input type="password" id="cpass" type="password" name="cpassword" placeholder="Confirme a senha" required>
                                <img src="https://i.stack.imgur.com/H9Sb2.png" alt="Olho para visualização da senha digitada" class="password-image">
                                <p id="confirma-senha-helper" class="helper-text"></p>
							</div> 
							<div class="field btn">
								<div class="btn-layer"></div>
								<input type="submit" id="signup" name="signup" value="Cadastrar">
							</div>
                        </form>  
                    </div> 
                  </div>
                </div>    
            </div> 
        </div>        
   </div>
</body>
<script src="../js/login.js" defer></script>
</html>