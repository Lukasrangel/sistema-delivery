const base = 'http://127.0.0.1/delivery/';
//Pagar em dinheiro
try{

    var opcao = document.querySelector('select');
    var divtroco = document.querySelector('.troco')
    if (opcao.value == 'dinheiro'){
        divtroco.style.visibility = "visible"
    }
    opcao.addEventListener('change', function(){
        if (opcao.value == 'dinheiro'){
            divtroco.style.visibility = "visible"
        
        } else {
            divtroco.style.visibility = "hidden"
        }
    })

} catch{

}

//AJAX excluir item da lista
function deleteList(id){
  
  fetch(base + "views/ajax/remover_do_pedido.php?id="+id)
  .then(response => {
      response.json().then(json => {
          if(json.sucesso){
            pedido = document.querySelector('tr#id'+id)
            preco = document.querySelector('td#preco')
            pedido.style.display = 'none'
            preco.innerHTML = 'Total: R$ '+ json.precoTotal.toFixed(2).replace('.',',')
          }
          
      });
  });
}


