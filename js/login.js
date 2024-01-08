//Form Rotate = Animação rotacionar formulário login - cadastro
const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");
signupBtn.onclick = (()=>{
  loginForm.style.marginLeft = "-50%";
  loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (()=>{
  loginForm.style.marginLeft = "0%";
  loginText.style.marginLeft = "0%";
});
signupLink.onclick = (()=>{
  signupBtn.click();
  return false;
});

//Função para mostrar e ocultar popup de campo obrigatório
function mostrarPopup(input) {
  input.addEventListener("focus", () => {
      input.classList.add('required-popup');
  });

  input.addEventListener("blur", () => {
      input.classList.remove('required-popup');
  });
}

// ---------- Validação Nome usuário ---------- //
let usernameInput = document.getElementById("name");
let usernameHelper = document.getElementById("username-helper");

// Validar valor do input
usernameInput.addEventListener('input', (e)=> {
    let valor = e.target.value
    if(valor.length < 3){
        usernameInput.classList.add('error')
        usernameHelper.classList.add('visible')
        usernameHelper.innerText = "Digite seu nome completo!";
        usernameInput.classList.remove('correct')
    } else{
        usernameInput.classList.add('correct')
        usernameHelper.classList.remove('visible')
        usernameInput.classList.remove('error')
        usernameHelper.innerText = '';
        
    }
})


// Validar email

function validarEmail(emailId, emailHelperId) {
    const emailInput = document.getElementById(emailId);
    const emailHelper = document.getElementById(emailHelperId);
  
    if (!emailInput || !emailHelper) {
      console.error("Elementos não encontrados. Verifique os IDs fornecidos.");
      return;
    }
  
    // Aplicar validação ao campo de email
    emailInput.addEventListener("input", (e) => {
      let valor = e.target.value;
      if (valor.includes("@") && valor.includes(".com")) {
        emailInput.classList.add("correct");
        emailInput.classList.remove("error");
        emailHelper.classList.remove("visible");
        emailHelper.innerText = '';
      } else {
        emailInput.classList.remove("correct");
        emailInput.classList.add("error");
        emailHelper.classList.add("visible");
        emailHelper.innerText = "coloque um endereço de email válido, ele deve conter '@' e '.com'";
      }
    });
  }
  
  // Usar a função para os IDs desejados
  validarEmail('email', 'email-helper');
  validarEmail('emaill', 'emaill-helper');




//Validação Campo Senha

const senhaInput = document.querySelector('input[name="senha"]');
const senha2Input = document.querySelector('input[name="senha2"]');
const senhaHelper = document.getElementById('senha-helper');
const confirmaSenhaHelper = document.getElementById('confirma-senha-helper');

function validarSenha(senha, helperElement) {
  if (senha.length < 8 || !/[a-z]/.test(senha) || !/[A-Z]/.test(senha) || !/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(senha)) {
    senhaInput.classList.add("error");
    helperElement.classList.add("visible");
    helperElement.innerText = "A senha deve ter pelo menos 8 caracteres!";
    senhaInput.classList.remove("correct");
  } else {
    senhaInput.classList.add("correct");
    helperElement.classList.remove("visible");
    senhaInput.classList.remove("error");
    helperElement.innerText = '';
  }
}

senhaInput.addEventListener("input", () => {
  validarSenha(senhaInput.value, senhaHelper);
});

senha2Input.addEventListener("input", () => {
  let senha = senhaInput.value;
  let senha2 = senha2Input.value;
  if (senha !== senha2) {
    senha2Input.classList.add("error");
    confirmaSenhaHelper.classList.add("visible");
    confirmaSenhaHelper.innerText = "As senhas não correspondem.";
    senha2Input.classList.remove("correct");
  } else {
    senha2Input.classList.add("correct");
    confirmaSenhaHelper.classList.remove("visible");
    senha2Input.classList.remove("error");
  }
});



// Mostrar senha
var inputs = document.querySelectorAll('.pass input');
var imgs = document.querySelectorAll('.pass img');

imgs.forEach(function (img, index) {
  img.addEventListener('click', function () {
    var input = inputs[index];
    input.type = input.type === 'text' ? 'password' : 'text';
  });
});


