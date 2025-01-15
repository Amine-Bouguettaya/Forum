<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\PostManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["categoryName", "DESC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function listTopicsByCategory($id) {

        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }
    public function findPostsByTopic($id) {
        $postManager = new PostManager();
        $topicManager = new TopicManager();
        $topic = $topicManager->findOneById($id);
        $posts = $postManager->findPostByTopics($id);

        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "Liste des posts par topic : ".$topic,
            "data" => [
                "topic" => $topic,
                "posts" => $posts
            ]
        ];
    }

    public function findPostByUserId($id) {
        $postManager = new PostManager();
        $posts = $postManager->findPostByUserId($id);

        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "Liste des posts par utilisateur",
            "data" => [
                "posts" => $posts,
                "id" => $id
            ]
        ];
    }

    public function createCategory() {
        $categoryManager = new CategoryManager();
        $newcategory = filter_input(INPUT_POST, "categoryName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        if ($newcategory) {
            $categoryManager->add(["categoryName" => $newcategory]);
        }
        $categories = $categoryManager->findAll(["categoryName", "DESC"]);

        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function createTopic($id) {

        $topicManager = new TopicManager();
        $postManager = new PostManager();
        $newtopic = filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $newpost = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($newtopic && $newpost) {
            $newTopicId = $topicManager->add(["title" => $newtopic, "category_id" => $id]);
            $postManager->add(["text" => $newpost, "topic_id" => $newTopicId]);

            $topic = $topicManager->findOneById($newTopicId);
            $posts = $postManager->findPostByTopics($newTopicId);

            return [
                "view" => VIEW_DIR."forum/listPosts.php",
                "meta_description" => "Liste des posts du topic : ".$topic,
                "data" => [
                    "topic" => $topic,
                    "posts" => $posts
                ]
                ];

        }
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }

    public function createPost($id) {
        $topicManager = new TopicManager();
        $postManager = new PostManager();

        $newpost = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if ($newpost) {
            $postManager->add(["text" => $newpost, "topic_id" => $id]);
        }

        $posts = $postManager->findPostByTopics($id);
        $topic = $topicManager->findOneById($id);

        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "Liste des posts du topic : ".$topic,
            "data" => [
                "topic" => $topic,
                "posts" => $posts
            ]
            ];
    }


    public function editTopic($id) {

        $topicManager = new TopicManager();
        $postManager = new PostManager();
        
        $newTopicName = filter_input(INPUT_POST, "text", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        
        if ($newTopicName) {
            $topicManager->edit(["title" => $newTopicName], $id);
        }

        $topic = $topicManager->findOneById($id);
        $posts = $postManager->findPostByTopics($id);

        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "Liste des posts du topic : ".$topic,
            "data" => [
                "topic" => $topic,
                "posts" => $posts
            ]
            ];
    }

    public function deleteTopic($id) {

        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();

        $topicManager->delete($id);

        header("location:index.php?ctrl=forum&action=index");
    }

    public function manageTopic($id) {
        $topicManager = new TopicManager();
        $postManager = new PostManager();

        $topic = $topicManager->findOneById($id);
        if ($topic->getClosed() == 0) {
            $topicManager->edit(["closed" => 1], $id);
        } else {
            $topicManager->edit(["closed" => 0], $id);
        }

        $topic = $topicManager->findOneById($id);
        $posts = $postManager->findPostByTopics($id);
        return [
            "view" => VIEW_DIR."forum/listPosts.php",
            "meta_description" => "Liste des posts par topic : ".$topic,
            "data" => [
                "topic" => $topic,
                "posts" => $posts
            ]
        ];
    }
}

inscription
login
post par topic
