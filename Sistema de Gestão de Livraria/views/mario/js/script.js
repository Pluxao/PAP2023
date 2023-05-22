const mario = document.querySelector('.mario');
const pipe = document.querySelector('.pipe');
let ponto = document.querySelector('.ponto');

let somjogo = document.querySelector('.somjogo');
function parar() {
    somjogo.pause();
}

const jump = () =>{
    mario.classList.add('jump');
    const pular = document.querySelector('.pular');
    pular.currentTime = 0;
    pular.play();

    setTimeout(() => {
        mario.classList.remove('jump');
    }, 500)
}

let tempo_pontuacao = null;
let pontuacao = 0;
let contarponto = () =>{
    pontuacao++;
    ponto.innerHTML = `Pontuação <b>${pontuacao}</b>`
}

tempo_pontuacao = setInterval(contarponto, 100);

    const loop = setInterval(() => {
    const pipePosition = pipe.offsetLeft;
    const marioPosition = +window.getComputedStyle(mario).bottom.replace('px', '');

    console.log(marioPosition);
    console.log(pipePosition);

    if(pipePosition <= 100 && pipePosition > 0 && marioPosition < 80){
        pipe.style.animation = 'none';
        pipe.style.left = `${pipePosition}px`;
        
        mario.style.animation = 'none';
        mario.style.bottom = `${marioPosition}px`;

        mario.src = './imagens/game-over.png';
        mario.style.width = '110px'

        const over = document.querySelector('.over');
        over.currentTime = 0;
        over.play();

        clearInterval(tempo_pontuacao);
        pontuacao = 0;
        
        parar();
        clearInterval(loop);
        const novoAcesso = new bootstrap.Modal(acesso);
        novoAcesso.show();
    }

}, 10);
document.addEventListener('keydown', jump);
