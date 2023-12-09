<?php

namespace QI\PetRescue\Controller;

use Exception;
use QI\PetRescue\Model\Repository\AnimalRepository;
use \PDO;
use QI\PetRescue\Model\OwnerlessAnimal;

require_once dirname(dirname(__DIR__)) . "/vendor/autoload.php";

session_start();

switch ($_GET["operation"]) {
    case "insert":
        insert();
        break;
        default:
        $_SESSION["msg_warning"] = "Operação inválida!!!";
        header("location:../View/message.php");
        exit;
}

function insert()
{
    if (empty($_POST)) {
        $_SESSION["msg_error"] = "Ops. Houve um erro inesperado!!!";
        header("../View/message.php");
        exit;
    }

    $animal = new OwnerlessAnimal(
        $_POST["specie"],
        $_POST["age"],
        $_POST["description"],
        $_POST["additionalinfo"],
        $_POST["user_number"]
    );

    // TODO Validar os dados do POST
    $errors = array();
    if (!empty($errors)) {
        // TODO MOSTRAR OS ERROS NA TELA DE MENSAGEM
    }
    try {
        $animal_repository = new AnimalRepository();
        $result = $animal_repository->insert($animal);
        if ($result) {
            $_SESSION["msg_success"] = "Chamado registrado com sucesso!!!";
        } else {
            $_SESSION["msg_warning"] = "Lamento, não foi possível registrar o chamado!!!";
        }
    } catch (Exception $e) {
        $_SESSION["msg_error"] = "Ops, houve um erro inesperado em nossa base de dados!!!";

        $log = $e->getFile() . " - " . $e->getLine() . " - " . $e->getMessage();
        Logger::writeLog($log);
    } finally {
        header("location:../View/message.php");
        exit;
    }
}

?>