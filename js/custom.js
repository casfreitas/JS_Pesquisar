// Recebe o seletor form-pesquisar
const formPesquisar = document.getElementById("form-pesquisar");

//Verificar se existe o form-pesquisar
if (formPesquisar) {
  // Aguardar o submit, quando o usuário clicar no botão executar a função
  formPesquisar.addEventListener("submit", async (e) => {

    // Bloquear para não recarregar a página
    e.preventDefault();

    // Substituir o texto do botão para Pesquisando...
    document.getElementById("btn-pesquisar").value = "Pesquisando...";

    const dadosForm = new FormData(formPesquisar);
    /*for (var dadosFormPesq of dadosForm.entries()) {
      console.log(dadosFormPesq[0] + " - " + dadosFormPesq[1]);
    }*/

    // Fazer a requisição para o arquivo pesquisar.php
    const dados = await fetch("pesquisar.php", {
      method: "POST",
      body: dadosForm
    });

    // Ler os dados retornado do arquivo pesquisar.php
    const resposta = await dados.json();
    //console.log(resposta);

    // Acessa o IF quando não retornar nenhum usuário do banco de dados
    if (!resposta['status']) {
      // Enviar a mensagem de erro do JavaScript para o HTML
      document.getElementById("msg").innerHTML = resposta['msg'];
    } else {
      // Substituir a mensagem de erro
      document.getElementById("msg").innerHTML = "";
      // Enviar a lista de usuarios do JavaScript para o HTML
      document.getElementById("listar_usuarios").innerHTML = resposta['dados'];
    }
    // Substituir o texto do botão para Pesquisar
    document.getElementById("btn-pesquisar").value = "Pesquisar";
  });
}