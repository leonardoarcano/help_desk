<?php
session_start();

//remover indices do array sessão
//unset();

//destruir toda a sessão
session_destroy();
header('Location: index.php');

?>