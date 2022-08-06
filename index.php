<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesquisar com PHP e JavaScript</title>
</head>

<body>
  <h1>Pesquisar Usuário</h1>

  <span id="msg"></span>

  <!-- Início do formulário -->
  <form id="form-pesquisar" action="">
    <label for="">Pesquisar: </label>
    <input type="text" name="texto_pesquisar" placeholder="Pesquisar pelo termo?"><br><br>

    <input type="submit" id="btn-pesquisar" value="Pesquisar" name="PesquisarUsuario"><br><br>
  </form>
  <!-- fim do formulário -->

  <span id="listar_usuarios"></span>

  <script src="js/custom.js"></script>
</body>

</html>