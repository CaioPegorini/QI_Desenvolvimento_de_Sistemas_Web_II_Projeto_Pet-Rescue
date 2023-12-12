<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/adotation.css">
    <title>Adoção</title>
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
            <form action="../Controller/AdoptionAnimal.php?operation=insert" method="post">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastrar pet</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="specie">Espécie</label>
                        <input id="specie" type="text" name="specie" placeholder="Digite a espécie do animal" required>
                    </div>

                    <div class="input-box">
                    <label for="age">Anos de idade</label>
                    <input type="number" id="age" name="age" min="0" max="30">
                    </div>

                    <div class="input-check">
                    <input type="checkbox" id="unknow" name="unknow" value="unknow">
                    <label for="vehicle1">Não sei</label><br>
                    </div>

                    <div class="input-box">
                    <label for="description">Descrição do Animal</label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control" required></textarea>
                    </div>

                    <div class="input-box">
                    <label for="additionalinfo">Descrição adicional</label>
                    <textarea name="additionalinfo" id="additionalinfo" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="input-box">
                        <label for="user_number">Contato</label>
                        <input id="user_number" type="tel" name="user_number" placeholder="(xx) xxxx-xxxx" required>
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