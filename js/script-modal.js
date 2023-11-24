function abrirModal()
{
    const modal = document.getElementById('modal-container')
    modal.classList.add('mostrar')

    modal.addEventListener('click', (e) =>
    {

        if (e.target.id == 'modal-container' || e.target.id == "fechar")
        {
            modal.classList.remove('mostrar')
            localStorage.fechaModal = 'modal-container'
        }
    })
}

 // Verificar se o modal já foi exibido anteriormente
 window.onload = function() 
 {
    var modalExibido = localStorage.getItem('modal-container');
    if (!modalExibido) 
    {
        abrirModal();
    }
};
