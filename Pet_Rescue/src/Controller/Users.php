<?php

namespace QI\PetRescue\Controller;

use Exception;
use QI\PetRescue\Model\Repository\UsersRepository;

require_once dirname(dirname(__DIR__)) . "/vendor/autoload.php";

session_start();

switch($_GET["operation"]) {
    case "insert" :
        insert();
        break;
    //case "findAll";
    //    findAll();
    //    break;
    //default;
    $_SESSION["msg_error"] = "Operação inválida!";
    header("../View/message.php");
        exit;
}

function insert() {
    if(empty($_POST)){
        $_SESSION["msg_error"] = "Ops! Houve um erro inesperado.";
        header("../View/message.php");
        exit;
    }
    $errors = array();
    if(!empty($errors)){
    }
    try{
        $users = new UsersRepository();
        $result = $users->insert($users);
        if($result){
            $_SESSION["msg_sucess"] = "Usuário registrado com sucesso!";
        }else{
            $_SESSION["msg_warning"] = "Lamento, não foi possível registrar o usuário.";
        }
    }catch(Exception $e){
        $_SESSION["msg_error"] = "Ops, houve um erro inesperado em nossa base de dados!";
        $log = $e->getFile()." - ".$e->getLine()." - ".$e->getMessage(); //$e é a nossa variável exception
        Logger::writeLog($log);
    }finally{
        header("location:../View/message.php");
        exit;
    }
}

//function findAll() {
//    $call_repository = new CallRepository();
//    $_SESSION["list-of-calls"] = $call_repository->findAll();
//    header("location:../View/list-f-calls.php")
//}

?>