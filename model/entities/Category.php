<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Category extends Entity{

    private $id;
    private $categoryName;
    private $categoryDescription;

    // chaque entité aura le même constructeur grâce à la méthode hydrate (issue de App\Entity)
    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getCategoryName(){
        return $this->categoryName;
    }

    public function setCategoryName($categoryName){
        $this->categoryName = $categoryName;
        return $this;
    }

    public function __toString(){
        return $this->categoryName;
    }

    /**
     * Get the value of categoryDescription
     */ 
    public function getCategoryDescription()
    {
        return $this->categoryDescription;
    }

    /**
     * Set the value of categoryDescription
     *
     * @return  self
     */ 
    public function setCategoryDescription($categoryDescription)
    {
        $this->categoryDescription = $categoryDescription;

        return $this;
    }
}