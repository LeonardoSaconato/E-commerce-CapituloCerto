const $menu = document.getElementById('menu');
const $menuTrigger = document.getElementById('menu-trigger');
let state = $menu.dataset.aberto;

$menuTrigger.addEventListener('click', () => {
  if(state == "false") {
    state = "true";
  } else {
    state = "false";
  }
  
  $menu.dataset.aberto = state;
})

function removerToken() {
  // Lógica para remover o token do localStorage
  localStorage.removeItem('token'); // Substitua 'seuToken' pelo nome do seu token armazenado
  // Outras ações que você pode querer executar ao remover o token
}

// Adicionar um ouvinte de evento para o clique na tag <a> com ID "removerToken"
document.getElementById('removerToken').addEventListener('click', function(event) {
  event.preventDefault(); // Impedir o comportamento padrão de seguir o link
  removerToken();         // Chamar a função para remover o token
});

