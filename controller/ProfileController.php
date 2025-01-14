<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;
use Model\Managers\UserManager;


class ProfileController extends AbstractController implements ControllerInterface{
    
    public function index() {

        $userManager = new UserManager();
        $postManager = new PostManager();

        $user = $userManager->findOneById($_GET['id']);
        $posts = $postManager->findPostByUserId($_GET['id']);

        return [
            "view" => VIEW_DIR."forum/profile.php",
            "meta_description" => "Page de profile",
            "data" => [
                "user" => $user,
                "posts" => $posts
            ]
        ];
    }

    
}