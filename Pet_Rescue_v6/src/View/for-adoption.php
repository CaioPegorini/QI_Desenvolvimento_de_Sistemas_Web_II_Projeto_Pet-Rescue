<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Adoção</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body class="m-5">
    <nav class="bg-info p-3 d-flex justify-content-between">
        <div>
            <a href="adotation.php" class="text-decoration-none text-white">Cadastrar Pet</a>
        </div>
        <a href="../Controller/Auth.php?operation=logout" class="text-decoration-none text-white">Sair</a>
    </nav>
    <main class="m-5">
        <table class="table table-bordered table-primary">
            <thead>
                <th>#</th>
                <th>Espécie</th>
                <th>Idade</th>
                <th>Descrição</th>
                <th>Informações adicionais</th>
                <th>Contato</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php
                if (empty($_SESSION["OwnerlessAnimal"])): 
                    ?>
                    <td colspan=6>Não existem animais cadastrados</td>
                    <?php
                    endif;
                    foreach ($_SESSION["OwnerlessAnimal"] as $animal) :
                ?>
                    <tr>
                        <td>
                            <?= $animal["id"] ?>
                        </td>
                        <td>
                            <?= $animal["specie"] ?>
                        </td>
                        <td>
                            <?= $animal["age"] ?>
                        </td>
                        <td>
                            <?= $animal["description"] ?>
                        </td>
                        <td>
                            <?= $animal["additionalinfo"] ?>
                        </td>
                        <td>
                            <?= $animal["user_number"] ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="../Controller/Call.php?operation=findOne&code=<?= $call["id"] ?>" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="../Controller/AdoptionAnimal.php?operation=delete&code=<?= $animal["id"] ?>" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>