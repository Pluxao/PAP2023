const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})


function fazerLogin(){
  const logar = document.getElementById('logar');
  const novoLogin = new bootstrap.Modal(logar);
  novoLogin.show();
}

function pesquisar(){
  const pesquisar = document.getElementById('pesquisar');
  const novaPesquisa = new bootstrap.Modal(pesquisar);
  novaPesquisa.show();
}

function lerLivro(){
  const lerlivro = document.getElementById('lerlivro');
  const novoLivro = new bootstrap.Modal(lerlivro);
  novoLivro.show();
}

function categorias(){
  const categoria = document.getElementById('categoria');
  const novaCategoria = new bootstrap.Modal(categoria);
  novaCategoria.show();
}