<?php
//Incluir a conexão com o banco de dados
include_once "./conexao.php";

//Recebe os dados jo JavaScript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Acessa o IF quando o campo pesquisar usuários possuir valor
if (!empty($dados['texto_pesquisar'])) {

  // Criar a variável com o caracter "%" indicando que pode ter lestras antes e depois do valor pesquisar
  $nome = "%" . $dados['texto_pesquisar'] . "%";

  // Criar QUERY pesquisar usuarios
  $query_usuarios = "SELECT id, nome, email FROM usuarios WHERE nome LIKE :nome";
  // Prepara a QUERY
  $result_uruarios = $conn->prepare($query_usuarios);
  // Substitui o link pelo valor que vem do formulário
  $result_uruarios->bindParam(':nome', $nome);
  //Executar a QUERY
  $result_uruarios->execute();

  $listar_usuarios = "";

  // Acessa o IF quando retonrar usuario no banco de dados
  if (($result_uruarios) and ($result_uruarios->rowCount() != 0)) {

    //Ler os registros retornado do banco ed dados
    while ($row_usuario = $result_uruarios->fetch(PDO::FETCH_ASSOC)) {

      // Extrair o array para imprimir através da chave no array
      extract($row_usuario);

      // Imprimir o valor de cada coluna retornada do banco de dados
      $listar_usuarios .= "ID: $id<br>";
      $listar_usuarios .= "Nome: $nome<br>";
      $listar_usuarios .= "Email: $email<br>";
      $listar_usuarios .= "<hr>";
    }

    // Criar o array de informações que será retornado para o JavaScript
    $retorna = ['status' => true, 'dados' => $listar_usuarios];
  } else {
    // Criar o array de informações que será retornado para o JavaScript
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Nenhum usuário encontrado</p>"];
  }
} else {
  // Criar o array de informações que será retornado para o JavaScript
  $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Nenhum usuário encontrado</p>"];
}

echo json_encode($retorna);
