<?php
session_start()
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal perdido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../assets/css/lostanimal.css">
</head>

<body>
    <header>
        <div class="content">
            <nav>
                <p class="brand">Pet<srtong>Rescue<strong></p>
                <ul>
                    <li><a href="#catalog">Catalogo</a></li>
                    <li><a href="#about">sobre</a></li>
                    <button type="submit" class="button">
                        <a href="../Controller/AdoptionAnimal.php?operation=findAllAnimals">Listar animal</a>
                    </button>
                </ul>
            </nav>
            <div class="header-block">
                <div class="text">
                    <h2>Animais perdidos</h2>
                    <p>Cadastre seu animalzinho perdido, e permita nossa comunidade a te ajudar a encontrá-lo ou achar seu respectivo dono.</p>
                </div>
                <img src="../../assets/img/vira-lata-caramelo-cao.jpg" alt="">
            </div>
        </div>
    </header>
    <section class="catalog" id="catalog">
        <div class="content">
            <div class="title-wrapper-catalog">
                <p>Veja se seu pet está aqui</p>
                <h3>Catálogo</h3>
            </div>
            <div class="filter-card">
                <input type="text" class="search-input" placeholder="Procure as características de seu animal" />
                <button class="search-button">Pesquisar</button>
            </div>
            <div class="card-wrapper">
                <?php
                foreach ($_SESSION["OwnerlessAnimal"] as $animal) :
                ?>
                    <div class="card-item">
                        <img src="../../assets/img/cat.png" alt="Cat" />
                        <div class="card-content">
                            <h3><?= $animal["id"] ?></h3>
                            <p> Espécie:
                                <?=
                                $animal["specie"]
                                ?>
                            </p>
                            <p> Idade:
                                <?=
                                $animal["age"]
                                ?>
                            </p>
                            <p> Descrição:
                                <?=
                                $animal["description"]
                                ?>
                            </p>
                            <p> Informações adicionais:
                                <?=
                                $animal["additionalinfo"]
                                ?>
                            </p>
                            <p> Contato:
                                <?=
                                $animal["user_number"]
                                ?>
                            </p>
                            <div class="btn-group">
                                <a href="../Controller/AdoptionAnimal.php?operation=findOneAnimal&code=<?= $animal["id"] ?>" class="btn btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="../Controller/AdoptionAnimal.php?operation=deleteAnimal&code=<?= $animal["id"] ?>" class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                            <button type="button">Encontrei!</button>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="content">
            <div class="title-wrapper-about">
                <p>Saiba mais sobre</p>
                <h3>Sobre</h3>
            </div>
            <div class="about-content">
                <div class="left">
                    <img src="../../assets/img/Gato-PNG.webp" alt="About" />
                </div>
                <div class="right">
                    <h3>Bem vindo á nossa comunidade!</h3>
                    <p>
                        Aqui é um cantinho na internet dedicado a animais perdidos. Aqui, fotos e histórias de pets desaparecidos são compartilhadas, enquanto pessoas se unem para ajudar a encontrar esses companheiros. Comentários solidários e mensagens de apoio se multiplicam, formando uma rede de esperança. É um refúgio virtual onde o amor por esses animais ultrapassa fronteiras, buscando reunir esses amigos de quatro patas com suas famílias.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="main">
            <div class="content footer-links">
                <div class="footer-company">
                    <h4>compania</h4>
                    <h6>Sobre</h6>
                    <h6>Contato</h6>
                </div>
                <div class="footer-social">
                    <h4>Continue conectado</h4>
                    <div class="social-icons">
                        <img src="../../assets/img/instagram.png" alt="Instagram">
                        <img src="../../assets/img/facebook.png" alt="Facebook">
                    </div>
                </div>
                <div class="footer-contact">
                    <h4>Fale conosco</h4>
                    <h6>+55 51 98886789</h6>
                    <h6>contato@dev.com.br</h6>
                </div>
            </div>
        </div>
        <div class="last">PetRescue 2021 - Animal petff</div>
    </footer>
</body>

</html>