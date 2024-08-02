let btnLogin = document.getElementById('btn-login');
let boxLogin = document.getElementById('box-login');
let msg = document.getElementById('msg');

function toggleLoginBox() {
    boxLogin.classList.toggle('abrir-login');
}
btnLogin.addEventListener('click', (event) => {
    event.stopPropagation();
    toggleLoginBox();
});
document.addEventListener('click', (event) => {
    if (boxLogin.classList.contains('abrir-login') && !boxLogin.contains(event.target) && event.target !== btnLogin) {
        boxLogin.classList.remove('abrir-login');
    }
});

// Função para mostrar e esconder a senha
function mostrarsenha() {
    var senha = document.getElementById('senha');
    var btnsenha = document.getElementById('btn-senha');

    if(senha.type === 'password'){
        senha.setAttribute('type','text');
        btnsenha.classList.replace('bi-eye','bi-eye-slash');
    } else {
        senha.setAttribute('type','password');
        btnsenha.classList.replace('bi-eye-slash','bi-eye')
    };
}

// Mostra a mensagem
msg.style.display = 'block';
msg.style.top = '20px'; 
 // Apaga a mensagem apos 10 segundos
 setTimeout(() => {
    msg.style.top = '-100%'; 
    setTimeout(() => {
        msg.style.display = 'none'; 
    }, 1000); 
}, 4000);


// document.getElementById('loginForm').addEventListener('submit', function(event) {
//     event.preventDefault();

//     let emailTeste = document.getElementById('email').value;
//     let senhaTeste = document.getElementById('senha').value;

//     let email = "teste@gmail.com";
//     let senha = "12345678";  

//     if (emailTeste === email && senhaTeste === senha) {
//         window.location.href = 'logado.html';
//     } else {
//         alert('E-mail ou senha incorretos');
//     }
// });

