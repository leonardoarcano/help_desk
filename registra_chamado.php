<?php
    session_start();
    
    //trabalhando a montagem do texto
    $titulo = str_replace('#', '-', $_POST['titulo']);
    $categoria = str_replace('#', '-', $_POST['categoria']);
    $descricao = str_replace('#', '-', $_POST['descricao']);

    $texto = $_SESSION['id'] . '#' .$titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

    //abrindo o arquivo
    $arquivo = fopen('arquivo.hd', 'a');
    //escrevendo o texto no arquivo
    fwrite($arquivo, $texto);
    //fechando o arquivo
    fclose($arquivo);
    //retorna à página de abrir chamados
    header('Location: abrir_chamado.php');
?>