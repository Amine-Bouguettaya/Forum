<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?= $meta_description ?>">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
       
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
        <title>Tech'Talk</title>
    </head>
    <body>
        <header>
            <div class="logoName">
                <i class="fa-solid fa-laptop-code"></i>
                <a href="#">Tech'Talk</a>
            </div>
            <div>
                <form action="#">
                    <div class="searchContainer">
                        <input type="text" name="recherche" placeholder="Recherche...">
                            <Button type="submit" class="icon-submit"><i class="fa-solid fa-magnifying-glass"></i></Button>
                    </div>
                </form>
                </div>
            <nav class="ButtonContainer">
            <?php
                // si l'utilisateur est connecté 
                if(App\Session::getUser()) {?>
                    <a href="index.php?ctrl=security&action=profile">Mon Compte</a>
                    <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
                    <?php } else { ?>
                            <a href="index.php?ctrl=security&action=login">Connexion</a>
                            <a href="index.php?ctrl=security&action=register">Inscription</a>    
                    <?php } ?>
            </nav>
        </header>
        <div id="wrapper"> 
            <div id="mainpage">
                <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
                <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
                <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
                <div>
                    <nav>
                        <div id="nav-left">
                            <a href="index.php?ctrl=home&action=home">Accueil</a>
                            <?php
                            if(App\Session::isAdmin()){
                                ?>
                                <a href="index.php?ctrl=home&action=users">Voir la liste des gens</a>
                            <?php } ?>
                        </div>
                        <div id="nav-right">
                        <?php
                            // si l'utilisateur est connecté 
                            if(App\Session::getUser()){
                                ?>
                                <a href="index.php?ctrl=security&action=profile"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser()?></a>
                                <a href="index.php?ctrl=security&action=logout">Déconnexion</a>
                                <?php
                            }
                            else{
                                ?>
                                <a href="index.php?ctrl=security&action=login">Connexion</a>
                                <a href="index.php?ctrl=security&action=register">Inscription</a>
                                <a href="index.php?ctrl=forum&action=index">Liste des catégories</a>
                                <a href="index.php?ctrl=home&action=users">Liste utilisateur</a>
                            <?php
                            }
                        ?>
                        </div>
                    </nav>
                        </div>
                
                <main id="forum">
                    <?= $page ?>
                </main>
            </div>
            </div>
            <div class="container" style="max-width: 100%;">
            <footer class="py-5">
                <div class="d-flex">
                    <div class="col-5 ms-5 text-white">
                        <h3>SERVICES TECH'TALK</h3>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-white" href="#">À Propos</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-white" href="#">Questions</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-white" href="#">Nous contactez</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-white" href="#">Règlement du forum</a></li>
                        </ul>
                    </div>
                    <div class="col-4 text-white">
                        <h3>MENTION LÉGALES</h3>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-white" href="#">Conditions générales d'utilisations</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-white" href="#">Politique de confidentialité</a></li>
                            <li class="nav-item mb-2"><a class="nav-link p-0 text-white" href="#">Règlement du forum</a></li>
                        </ul>
                    </div>
                    <div class="col text-white">
                        <form action="newsletter" method="post">
                            <h3 class="mb-2">S'INSCRIRE À LA NEWSLETTER</h3>
                            <div id="submitContent" class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <input type="text" id="newsletter" placeholder="Adresse email">
                                <input type="submit" id="submitButton" value="S'inscrire">
                            </div>
                        </form>
                    </div>
                </div>
            </footer>
            </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function(){
                $(".message").each(function(){
                    if($(this).text().length > 0){
                        $(this).slideDown(500, function(){
                            $(this).delay(3000).slideUp(500)
                        })
                    }
                })
                $(".delete-btn").on("click", function(){
                    return confirm("Etes-vous sûr de vouloir supprimer?")
                })
                tinymce.init({
                    selector: '.post',
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table paste code help wordcount'
                    ],
                    toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                    content_css: '//www.tiny.cloud/css/codepen.min.css'
                });
            })
        </script>
        <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </body>
</html>