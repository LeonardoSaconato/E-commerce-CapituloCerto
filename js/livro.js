const arrayLivros = [
    {
        imagem: "./imagens/analise-de-trafego-tcp.jpg",
        link: "./sinopses/analise-de-trafego-tcp.html",
        titulo: "Análise TCP/IP",
        preco: "R$ 86,49",
        genero:"Gênero: Análise de Redes"
    },
    {
        imagem: "./imagens/codigo-limpo.jpg",
        link: "./sinopses/codigo-limpo.html",
        titulo: "Código Limpo",
        preco: "R$ 100,00",
        genero: "Gênero: Desenvolvimento"
    },
    {
        imagem: "./imagens/guia-pratico-html-css.jpg",
        link: "./sinopses/html-e-css-guia-pratico.html",
        titulo: "HTML e CSS: Guia Prático",
        preco: "R$ 113,57",
        genero: "Gênero: Desenvolvimento"
    },
    {
        imagem: "./imagens/introducao-python.jpg",
        link: "./sinopses/introducao-a-python.html",
        titulo: "Introdução a Python",
        preco: "R$ 66,75",
        genero: "Gênero: Desenvolvimento"
    },
    {
        imagem: "./imagens/java-como-programar.jpg",
        link: "./sinopses/java-como-programar.html",
        titulo: "Java: Como Programar",
        preco: "R$ 270,00",
        genero: "Gênero: Desenvolvimento"
    },
    {
        imagem: "./imagens/redes-de-computadores.jpg",
        link: "./sinopses/redes-de-computadores.html",
        titulo: "Redes de Computadores",
        preco: "R$ 205,00",
        genero: "Gênero: Redes"
    },
    {
        imagem: "./imagens/sistemas-operacionais.jpg",
        link: "./sinopses/sistemas-operacionais.html",
        titulo: "Sistemas Operacionais",
        preco: "R$ 280,00",
        genero: "Gênero: Sistemas Operacionais"
    },
    {
        imagem: "./imagens/sql-para-leigos.jpg",
        link: "./sinopses/sql-para-leigos.html",
        titulo: "SQL Para Leigos",
        preco: "R$ 92,40",
        genero: "Gênero: Banco de Dados"
    },
    {
        imagem: "./imagens/tecnicas-de-invasao.jpg",
        link: "./sinopses/tecnicas-de-invasao.html",
        titulo: "Técnicas de Invasão",
        preco: "R$ 49,73",
        genero: "Gênero: Hacking"
    },
    {
        imagem: "./imagens/use-a-cabeca.jpg",
        link: "./sinopses/use-a-cabeca.html",
        titulo: "Use a cabeça! PHP e MySQL",
        preco: "R$ 60,00",
        genero: "Gênero: Desenvolvimento e BD"
    },

    {
        imagem: "./imagens/1984.jpg",
        link: "./sinopses/1984.html",
        titulo: "1984",
        preco: "R$ 79,00",
        genero: "Literatura"
    },

    {
        imagem: "./imagens/a-culpa-e-das-estrelas.jpg",
        link: "./sinopses/a-culpa-e-das-estrelas.html",
        titulo: "A Culpa é das Estrelas",
        preco: "R$ 32,40",
        genero: "Literatura"
    },

    {
        imagem: "./imagens/a-revolucao-dos-bichos.jpg",
        link: "./sinopses/a-revolucao-dos-bichos.html",
        titulo: "A Revolução dos Bichos",
        preco: "R$ 60,00",
        genero: "Literatura"
    },

    {
        imagem: "./imagens/cem-anos-de-solidao.jpg",
        link: "./sinopses/cem-anos-de-solidao.html",
        titulo: "Cem Anos de Solidão",
        preco: "R$ 66,75",
        genero: "Literatura"
    },

    {
        imagem: "./imagens/dom-quixote.jpg",
        link: "./sinopses/dom-quixote.html",
        titulo: "Dom Quixote",
        preco: "R$ 46,49",
        genero: "Literatura"
    },

    {
        imagem: "./imagens/harry-potter-e-a-pedra-filosofal.jpg",
        link: "./sinopses/harry-potter-e-a-pedra-filosofal.html",
        titulo: "Harry Potter e a Pedra Filosofal",
        preco: "R$ 87,00",
        genero: "Literatura"
    },

    {
        imagem: "./imagens/o-apanhador-no-campo.jpg",
        link: "./sinopses/o-apanhador-no-campo.html",
        titulo: "O Apanhador no Campo de Centeio",
        preco: "R$ 65,00",
        genero: "Literatura"
    },

    {
        imagem: "./imagens/o-grande-gatsby.jpg",
        link: "sinopses/o-grande-gatsby.html",
        titulo: "O Grande Gatsby",
        preco: "R$ 53,57",
        genero: "Literatura"
    },

    {
        imagem: "./imagens/o-pequeno-principe.jpg",
        link: "./sinopses/o-pequeno-principe.html",
        titulo: "O Pequeno Príncipe",
        preco: "R$ 49,73",
        genero: "Literatura"
    },

    {
        imagem: "./imagens/o-senhor-dos-aneis.jpg",
        link: "./sinopses/o-senhor-dos-aneis.html",
        titulo: "O Senhor dos Anéis: A Sociedade do Anel",
        preco: "R$ 180,00",
        genero: "Literatura"
    },

    
  ]

  for(let i = 0; i < arrayLivros.length; i++) {
    const infoL = document.createElement('div');
    infoL.setAttribute('class','info-livros');
    infoL.innerHTML =
      `
        <a href = "${arrayLivros[i].link}" target="_self" rel="next"><img src="${arrayLivros[i].imagem}" alt="${arrayLivros[i].titulo}" class="capa-livros"></a>
        <h2>${arrayLivros[i].titulo}</h2>
        <h3>${arrayLivros[i].preco}</h3>
        <h3>${arrayLivros[i].genero}</h3>
      `
    const div = document.querySelector('.livros');
    div.appendChild(infoL);
}
