<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UserManager;
use Model\Managers\TopicManager;

class HomeController extends AbstractController implements ControllerInterface {

    public function index(){
        return [
            "view" => VIEW_DIR."home.php",
            "meta_description" => "Page d'accueil du forum"
        ];
    }
        
    public function users(){
        $this->restrictTo("ROLE_ADMIN");

        $manager = new UserManager();
        $users = $manager->findAll(['creationDate', 'DESC']);

        return [
            "view" => VIEW_DIR."security/users.php",
            "meta_description" => "Liste des utilisateurs du forum",
            "data" => [ 
                "users" => $users 
            ]
        ];
    }

    public function search() {

        $value = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $userManager = new UserManager();
        $topicManager = new TopicManager();

        if ($value) {
            $users = $userManager->searchBar("username", $value);
            $topics = $topicManager->searchBar("title", $value);
            return [
                "view" => VIEW_DIR."search.php",
                "meta_description" => "Resultat de la recherche",
                "data" => [
                    "users" => $users,
                    "topics" => $topics
                ]
                ];
        } else {  
            return [
                "view" => VIEW_DIR."home.php",
                "meta_description" => "Page d'accueil du forum",
                ];
        }
    }
}
