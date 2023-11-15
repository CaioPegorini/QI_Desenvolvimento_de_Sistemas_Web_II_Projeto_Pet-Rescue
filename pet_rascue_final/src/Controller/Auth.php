<?php

session_start();

switch($_GET["operation"]) {
    case "login":
        login();
        break;
    case "logout":
        logout();
        break;

    $_SESSION["msg_warning"] = "Operação inválida!";
    header("src/View/message.php");
    exit;
}

function login() {
    $users = array(
        array(
            "name" => "Eduarda",
            "email" => "eduardamacb007@gmail.com",
            "password" => password_hash("Duda", PASSWORD_DEFAULT)
        ),
        array(
            "name" => "Caio",
            "email" => "caiopegorini@gmail.com",
            "password" => password_hash("Caio", PASSWORD_DEFAULT)
        )
    );
    
    if(empty($_POST)) {
        $_SESSION["msg_error"] = "Ops, houve um erro inesperado!"; //esta mensagem aparecerá se o usuário tentar digitar diretamente o endereço "localhost/auth.php" para tentar acessar esta página, porém sem se autentificar antes
        header("location:scr/View/message.php");
        exit;
    }
    
    $email = $_POST["user_email"];
    $pass = $_POST["user_password"];
    
    foreach($users as $user) {
        if($email == $user["email"] && password_verify($pass, $user["password"])) {
            $_SESSION["user_data"] = $user;
            header("location:index.html");
            exit;
        }
    }
    
    $_SESSION["msg_warning"] = "Lamento, usuário não localizado.";
    header("location:src/View/message.php");    
}

function logout() {
    unset($_SESSION["user_data"]);
    header("location:index.html");
    exit;
}

?>