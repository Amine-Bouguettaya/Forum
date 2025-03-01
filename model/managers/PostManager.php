<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class PostManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Post";
    protected $tableName = "Post";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les post d'un topic spécifique (par son id)
    public function findPostByTopics($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.topic_id = :id";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function findPostByUserId($id) {
        
        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.user_id = :id";

        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }

    public function getLastPosts() {
        
        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                ORDER BY t.creationDate DESC
                LIMIT 5";

        return  $this->getMultipleResults(
            DAO::select($sql), 
            $this->className
        );
    }
}