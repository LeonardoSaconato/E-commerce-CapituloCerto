document.addEventListener('DOMContentLoaded', function () {
    // Adiciona um evento de clique ao botão "Adicionar ao carrinho"
    document.getElementById('addbook').addEventListener('click', function () {
        console.log('adicionando ao carrito')
        // Obtém os dados do livro
        var titulo = document.querySelector('.product-titulo').innerText;
        var preco = document.querySelector('.product-preco').innerText;
        var imagemSrc = document.querySelector('.book-image').getAttribute('src');

        // Cria um objeto com os dados do livro
        var livro = {
            titulo: titulo,
            preco: preco,
            imagemSrc: imagemSrc
        };

        // Obtém o array de objetos do localStorage ou cria um novo array se não existir
        var carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

        // Adiciona o livro ao array de objetos
        carrinho.push(livro);

        // Armazena o array atualizado no localStorage
        localStorage.setItem('carrinho', JSON.stringify(carrinho));

        alert('Livro adicionado ao carrinho!');
    });
});