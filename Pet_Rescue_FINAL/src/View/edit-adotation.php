<?php
require_once dirname(__DIR__) . "/Controller/Auth-Verify.php";
$animal = $_SESSION["animal"];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/adotation.css">
    <title>Editar Pet</title>
</head>

<body>
    <div class="container">
    <div class="back-button">
                    <button type="submit" class="button">
                        <a href="../../index.html">voltar</a></button>
            </div>
        <div class="form-image">
            <img src="../../assets/img/undraw_cat_epte.svg" alt="">
        </div>
        <div class="form">
            <form action="../Controller/AdoptionAnimal.php?operation=updateAnimal" method="post">
                <input type="hidden" name="code" value="<?= $_SESSION["animal"]["id"] ?>">
                <div class="form-header">
                    <div class="title">
                        <h1>Editar Pet</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="specie">Espécie</label>
                        <input id="specie" type="text" name="specie" placeholder="Digite a espécie do animal" required value="<?= $_SESSION["animal"]["specie"] ?>">
                    </div>

                    <div class="input-box">
                    <label for="age">Anos de idade</label>
                    <input type="number" id="age" name="age" min="0" max="30" value="<?= $_SESSION["animal"]["age"] ?>">
                    </div>

                    <div class="input-check">
                    <input type="checkbox" id="unknow" name="unknow" value="unknow">
                    <label for="vehicle1">Não sei</label><br>
                    </div>

                    <div class="input-box">
                    <label for="description">Descrição do Animal</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control" required value="<?= $_SESSION["animal"]["description"] ?>"></textarea>
                    </div>

                    <div class="input-box">
                    <label for="additionalinfo">Descrição adicional</label>
                    <textarea name="additionalinfo" id="additionalinfo" cols="30" rows="5" class="form-control"></textarea value="<?= $_SESSION["animal"]["additionalinfo"] ?>">
                    </div>

                    <div class="input-box">
                        <label for="user_number">Contato</label>
                        <input id="user_number" type="tel" name="user_number" placeholder="(xx) xxxx-xxxx" required value="<?= $_SESSION["animal"]["user_number"] ?>">
                    </div>
                                       
                    <div class="continue-button">
                    <button type="submit">Continuar</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</body>

</html>