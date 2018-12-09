<?php
  $conn_servername = "localhost";       // nazwa servera
  $conn_username = "wipaka_rajczogli";        // nazwa użytkownika
  $conn_password = "kauczuk1";          // hasło
  $conn_db = "config";                    // nazwa bazy danych
  $conn = mysqli_connect($conn_servername,$conn_username,$conn_password,$conn_db);      // połączenie z bazą danych
  if(mysqli_connect_errno()){       // jeżeli nie połączy się z bazą danych i wystąpi błąd - wypisze kuku i zginiesz
    echo 'wystąpił błąd';
    die();          // zerwij połączenie
  }
?>
