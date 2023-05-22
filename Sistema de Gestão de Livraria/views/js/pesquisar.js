var search = document.getElementById('pesquisar_l');

search.addEventListener("keydown", function(event){
    if (event.key === "Enter") {
        searchLivros();
    }
});

function searchLivros() {
    window.location = "utodoslivros.php?search="+search.value; 
}