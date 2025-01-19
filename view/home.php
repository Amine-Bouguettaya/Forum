<?php
    $categories = $result["data"]['categories'];
    $posts = $result["data"]['posts'];
?>

<h1>Bienvenue sur Tech'Talk. Explorez l'avenir, un sujet à la fois.</h1>


<section class="main-content">
    <div class="homeCardContainer">
    <?php foreach($categories as $category ){ ?>
        <div class="forum-card">
            <div class="forum-header">
                <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getCategoryName() ?></a>
                <div class="forum-description"><?= $category->getCategoryDescription()?></div>
            </div>
            <div class="forum-stats">
                <div class="stat-item"><i class="fa-solid fa-bolt"></i>&nbsp;Bb Topics</div>
                <div class="stat-item"><i class="fa-regular fa-message"></i>&nbsp;Nb posts</div>
            </div>
        </div>
        <?php } ?>
    </div>

<div class="sidebar">
    <?php if (App\Session::getUser()) { ?>
    <div class="forum-card">
        <div class="forum-header">
            <h2>Bienvenue <?= App\Session::getUser()->getUsername() ?></h2>
            <p class="welcome-text">Accédez à vos informations en un instant.</p>
        </div>
        <a href="index.php?ctrl=profile&action=index&id=<?= App\Session::getUser()->getId() ?>" class="button button-primary">Mon Compte</a>
        <a href="index.php?ctrl=security&action=logout" class="button button-primary">Déconnexion</a>
    </div>
    <?php } else {?>
    <div class="forum-card">
        <div class="forum-header">
            <h2>Bienvenue!</h2>
            <p class="welcome-text">Rejoignez notre communauté pour commencer à échanger sur des sujets qui vous passionne.</p>
        </div>
        <a href="index.php?ctrl=security&action=login" class="button button-primary">Se Connecter</a>
        <a href="index.php?ctrl=security&action=register" class="button button-primary">S'inscrire</a>
    </div>
    <?php } ?>

    <div class="forum-card recent-activity">
        <div class="forum-header">
            <h2>Activité récente:</h2>
        </div>
        <?php foreach($posts as $post) { ?>
        <div class="activity-item">
            <p><?php if ($post->getUser()) {
                echo ("<a href='index.php?ctrl=profile&action=index&id=".$post->getUser()->getId()."'>".$post->getUser()->getUsername()."</a>"); } 
                else { echo "<span>Utilisateur Supprimé</span>";
                }?> a posté dans <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?=$post->getTopic()->getCategory()->getId()?>" class="activity-link"><?=$post->getTopic()->getCategory()->getCategoryName()?></a></p>
        </div>
        <?php } ?>
    </div>
</section>

<a href="index.php?ctrl=profile&action=index&id=.$post->getUser()->getId().">.$post->getUser()->getUsername().</a>
