<?php
  session_start();
  
  // conecta ao DB
  include("db-conector.php");

  if(isset($_REQUEST['login'])) {
    $usuario = $_REQUEST['usuario'];
    $senha = $_REQUEST['senha'];

    $sql = "SELECT * FROM user WHERE usuario = '$usuario' AND senha = '$senha'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();

    if(count($result) > 0) {
      $_SESSION['usuario'] = $usuario;
      header("location: ../index.php");
    }else {
      header("location: ../pages/login.php");
    }
  }

  if($_REQUEST['logout'] == 'sim') {
    session_destroy();
    header("location: ../index.php");
  }

?>