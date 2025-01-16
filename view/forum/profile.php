<?php
    $user = $result["data"]['user'];
    $posts = $result["data"]['posts']; 
?>

<h1>profile de <?=$user->getUsername()?></h1>
<h1>Liste des posts de <?=$user->getUsername()?></h1>

<?php

if (App\Session::getUser() && App\Session::getUser()->getId() == $user->getId()) { ?>
    <h2>Modifier votre profile</h2>
    <a href="index.php?ctrl=Profile&action=modify">Modifier Profile</a>

<?php }

if ($posts == null) {
    echo "<p>Il n'y a pas de post de cet utilisateur</p>";
} else

if ($posts) {
    
foreach($posts as $post) {?>
    <a href="index.php?ctrl=forum&action="><?=$post?></a>   
    <p> par </p>
    <a href="index.php?ctrl=profile&action=index&id=<?=$user->getId()?>"><?=$post->getUser()?></a>

    <br>
    <br>
<?php }

} ?>                                                                                      