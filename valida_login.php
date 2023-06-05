<?php
session_start();
// formulários normais usam o método GET para enviar informações7
/* 
print_r($_GET);
echo $_GET['email'];
echo '<br/>';
echo $_GET['senha'];*/

// formulários que necessitam de mais segurança, como os de login, usam o método "POST"
/* 
print_r($_POST);
echo $_POST['email'];
echo '<br/>';
echo $_POST['senha'];*/

$usuario_autentificado = false; 
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = array(
    1 => 'Admnistrativo', 2 => 'Usuário'
);

$usuarios_app = array(
    array('id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1 ),
    array('id' => 2, 'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
    array('id' => 3, 'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
    array('id' => 4, 'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2)
);
//a cada usuário é feito uma comparação, para descobrir se os dados enviados são válidos
foreach($usuarios_app as $user){

    if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
        $usuario_autentificado = true; //se as informações batem, o usuário passa a ser autentificado
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }
}

//condicional para decidir se a aplicação segue em frente ou é redirecionada para o index com erro
if ($usuario_autentificado){
    $_SESSION['autentificado'] = 'SIM';
    $_SESSION['id'] = $usuario_id;
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: home.php');
} else {
    $_SESSION['autentificado'] = 'NAO';
    header('Location: index.php?login=erro');
}
?>