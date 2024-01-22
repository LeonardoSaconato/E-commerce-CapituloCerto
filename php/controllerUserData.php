<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

// Quando o usuário clicar no botão Cadastrar
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "as senhas que você inseriu não correspondem. Por favor, verifique e tente novamente!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "O E-mail digitado já pertence a uma conta!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Codígo de Verificação de E-mail";
            $message = "Seu Codígo de verificação: $code ";
            $sender = "From: contato.leonardosaconato@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "Enviamos um código de verificação para seu e-mail - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Falha ao enviar o código!";
            }
        }else{
            $errors['db-error'] = "Falha ao inserir dados no banco de dados!";
        }
    }

}
    //Quando o usuário clicar no botão enviar código de verificação

    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: ../loja.php');
                exit();
            }else{
                $errors['otp-error'] = "Falha ao enviar o código!";
            }
        }else{
            $errors['otp-error'] = "O Codígo digitado está incorreto!";
        }
    }

 // Quando o Usuário clicar no botão de Login
if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM usertable WHERE email='$email'";
    $res = mysqli_query($con, $check_email);
    if(mysqli_num_rows($res) > 0){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if(password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if($status == 'verified'){
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: ../loja.php');
            } 
            else{
                $info = "Parece que você ainda não verificou seu e-mail - $email";
                $_SESSION['info'] = $info;
                header('location: user-otp.php');
                exit();
            }
        }else{
            $errors['email'] = "O E-mail ou senha digitado está incorreto!";
        }
    }else{
        $errors['email'] = "Parece que você ainda não é membro! Clique no link inferior para se cadastrar.";
    }
}


    //Se o usuário clicar no botão continuar no formulário de Reset de Senha
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Codigo Reset de Senha";
                $message = "Seu codigo para o Reset de senha: $code";
                $sender = "contato.leonardosaconato@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "Enviamos uma senha de redefinição de senha para seu e-mail - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Falha ao enviar o código!";
                }
            }else{
                $errors['db-error'] = "Algo deu errado!";
            }
        }else{
            $errors['email'] = "O E-mail digitado não existe!";
        }
    }

    //Se o usuário clicar, verifique o botão redefinir Senha
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Certifique-se de que sua senha tenha pelo menos 12 caracteres. Senhas mais longas geralmente são mais seguras.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "O Codígo digitado está incorreto!";
        }
    }

    //Se o usuário confirmar a alteração da senha
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "As senhas não correspondem!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //recebendo este e-mail usando sessão
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Sua senha foi alterada! Agora você pode fazer login com sua nova senha.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Falha ao alterar sua senha!";
            }
        }
    }
    
   //Se o usuário clicar para logar após redefinir a senha.
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
}

?>

