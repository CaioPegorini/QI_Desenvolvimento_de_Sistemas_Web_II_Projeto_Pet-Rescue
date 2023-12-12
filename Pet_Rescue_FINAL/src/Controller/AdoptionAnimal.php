<?php

namespace QI\PetRescue\Controller;

use Exception;
use QI\PetRescue\Model\OwnerlessAnimal;
use QI\PetRescue\Model\Repository\AnimalRepository;

require_once dirname(__DIR__) . "/../vendor/autoload.php";

session_start();

switch ($_GET["operation"]) {
    case "insert":
        insertAnimal();
        break;
    case "findAllAnimals":
        findAllAnimals();
        break;
    case "deleteAnimal":
        deleteAnimal();
        break;
    case "findOneAnimal":
        findOneAnimal();
        break;
    case "updateAnimal":
        updateAnimal();
        break;
    default:
        $_SESSION["msg_warning"] = "Operação inválida!";
        header("location:../View/message.php");
        exit;
}

function insertAnimal()
{

    if (empty($_POST)) {
        $_SESSION["msg_error"] = "Ops, houve um erro inesperado!";
        header("../View/message.php");
        exit;
    }

    $animal = new OwnerlessAnimal($_POST["specie"], $_POST["age"], $_POST["description"], $_POST["additionalinfo"], $_POST["user_number"]);
    $errors = array();
    if (!empty($errors)) {
    }
    try {
        $animal_repository = new AnimalRepository();
        $result = $animal_repository->insert($animal);
        if ($result) {
            $_SESSION["msg_success"] = "Animal cadastrado com sucesso!";
        } else {
            $_SESSION["msg_warning"] = "Lamento, não foi possível cadastrar o animal;";
        }
    } catch (Exception $e) {
        $_SESSION["msg_error"] = "Ops, houve um erro inseperado em nossa base de dados.";
        $log = $e->getFile() . " - " . $e->getLine() . " - " . $e->getMessage();
        Logger::writeLog($log);
    } finally {
        header("location:../View/message.php");
        exit;
    }
}

function findAllAnimals()
{
    $animal_repository = new AnimalRepository();
    $_SESSION["OwnerlessAnimal"] = $animal_repository->findAll();
    header("location:../View/for-adotation-list.php");
}

function deleteAnimal()
{
    $id = $_GET["code"];
    if (empty($id)) {
        $_SESSION["msg_error"] = "O código do animal é inválido!";
        header("location:../View/message.php");
        exit;
    }
    try {
        $animal_repository = new AnimalRepository;
        $result = $animal_repository->delete($id);

        if ($result) {
            $_SESSION["msg_success"] = "Animal removido da plataforma com sucesso!";
        } else {
            $_SESSION["msg_warning"] = "Lamento, não foi possível remover o animal da plataforma.";
        }
    } catch (Exception $e) {
        $_SESSION["msg_error"] = "Ops. Houve um erro inesperado em nossa base de dados!!!";
        $log = $e->getFile() . " - " . $e->getLine() . " - " . $e->getMessage();
        Logger::writeLog($log);
    } finally {
        header("location:../View/message.php");
    }
}

function findOneAnimal()
{
    $id = $_GET["code"];
    if (empty($id)) {
        $_SESSION["msg_error"] = "O código do animal é inválido!!!";
        header("location:../View/message.php");
        exit;
    }
    try {
        $animal_repository = new AnimalRepository();
        $result = $animal_repository->findOne($id);
        if ($result) {
            $_SESSION["animal"] = $result;
            header("location:../View/edit-adotation.php");
        } else {
            $_SESSION["msg_warning"] = "Lamento, o animal não foi localizado!!!";
            header("location:../View/message.php");
        }
    } catch (Exception $e) {
        $_SESSION["msg_error"] = "Ops, houve um erro inesperado em nossa base de dados!!!";

        $log = $e->getFile() . " - " . $e->getLine() . " - " . $e->getMessage();
        Logger::writeLog($log);
        header("location:../View/message.php");
    }
}

function updateAnimal()
{
    if (empty($_POST)) {
        $_SESSION["msg_error"] = "Ops. Houve um erro inesperado em nossa aplicação";
        header("location:../View/message.php");
        exit;
    }
    $animal = new OwnerlessAnimal($_POST["specie"], $_POST["age"], $_POST["description"], $_POST["additionalinfo"], $_POST["user_number"]);
    $animal->id = $_POST["code"];
    try {
        $animal_repository = new AnimalRepository();
        $result = $animal_repository->update($animal);
        if ($result) {
            $_SESSION["msg_success"] = "Animal atualizado com sucesso!";
        } else {
            $_SESSION["msg_warning"] = "Lamento, não foi possível atualizar o animal.";
        }
    } catch (Exception $e) {
        $_SESSION["msg_error"] = "Ops, houve um erro inseperado em nossa base de dados.";
        $log = $e->getFile() . " - " . $e->getLine() . " - " . $e->getMessage();
        Logger::writeLog($log);
    } finally {
        header("location:../View/message.php");
        exit;
    }
}
