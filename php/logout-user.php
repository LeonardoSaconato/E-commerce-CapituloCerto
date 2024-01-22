<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capítulo Certo</title>
</head>
<body>

    <!-- Seu conteúdo HTML -->

    <script>
        // Função para limpar o token do localStorage
        function limparTokenLocalStorage() {
            localStorage.removeItem('token');
            
        }
        // Chamar a função para limpar o token do localStorage
        limparTokenLocalStorage();

        // Redirecionar para a página index
        window.location.href = '../index.html';
    </script>

</body>
</html>