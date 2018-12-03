<?php
  $conn_servername = "";       // nazwa servera
  $conn_username = "";        // nazwa użytkownika
  $conn_password = "";          // hasło
  $conn_db = "";                    // nazwa bazy danych
  $conn = mysqli_connect($conn_servername,$conn_username,$conn_password,$conn_db);      // połączenie z bazą danych
  if(mysqli_connect_errno()){       // jeżeli nie połączy się z bazą danych i wystąpi błąd - wypisze kuku i zginiesz
    echo 'wystąpił błąd';
    die();          // zerwij połączenie
  }
?>
