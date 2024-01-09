const element = document.getElementById('addbook');
element.addEventListener("click", addToStorage);

function addToStorage() {

    const elementosPreco = document.getElementsByClassName('product-preco');
    for (let i = 0; i < elementosPreco.length; i++) {
        const preco = elementosPreco[i].textContent;
        localStorage.setItem('preco_' + i, preco);
    }
    const elementosTitulo = document.getElementsByClassName('product-titulo');
    for(let i = 0; i < elementosTitulo.length; i++){
        const nome = elementosTitulo[i].textContent;
        localStorage.setItem('nome_' + i, nome);
    }
    const elementoImg = document.getElementsByClassName('book-image');
    for(let i = 0; i< elementoImg.length; i++){
        const img = elementoImg[i].src;
        localStorage.setItem('img' + i, img)
    }
}
