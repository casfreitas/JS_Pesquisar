<?php
//Inicio da conexão com o banco de dados utilizando PDO
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "celke_pesquisar";
$port = 3306;

try {
  $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
  //echo "Conexão com o banco de dados realizado com sucesso.";
} catch (PDOException $err) {
  die("Error: Conexão com o banco de dados não relaizado com sucesso. Erro gerado" . $err->getMessage());
}
