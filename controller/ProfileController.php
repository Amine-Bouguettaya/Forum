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

    public function modify() {
        $userManager = new UserManager();
        $user = $userManager->findOneById(Session::getUser()->getId());

        return [
            "view" => VIEW_DIR."security/modify.php",
            "meta_description" => "Page de modification de profile",
            "data" => [
                "user" => $user
            ]
        ];
    }

    public function modifyRole() {
        $this->restrictTo("ROLE_ADMIN");

        $userManager = new UserManager();
        $user = $userManager->findOneById($_GET['id']);
        $role = filter_input(INPUT_POST, "role", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($role) {
            $userManager->edit(["role" => $role], $_GET['id']);
        }

        $this->redirectTo("home", "users");
    }
    
}