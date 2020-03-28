<?php
    
namespace App\Entity;
use \DateTime;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class Article
 * @package App\Entity
 */
class Article {
    /**
     * @var string
     */
    private $title = "";
    
    /**
     * @var string
     */
    private $subtitle = "";
    
    /**
     * @var DateTime
     */
    private $createdAt;
    
    /**
     * @var string
     */
    private $body;
    
    /**
     * @var string
     */
    private $author;
    
    /**
     * @var
     */
    private $image;
    
    /**
     * Constructeur par défaut
     */
    public function __construct() {
        $this->title = "titre";
        $this->subtitle = "sous-titre";
        $this->author = "lucas";
        $this->body = "body";
        $this->createdAt = new DateTime();
        $this->image = "";
    }
    
    public function getArticleTitle(): string{
        return $this->title;
    }
    function getArticleSubtitle(): string{
        return $this->subtitle;
    }
    function getArticleCreatedAt(): string{
        return $this->createdAt->format('d/m/y');
    }
    function getArticleAuthor(): string{
        return $this->author;
    }
    function getArticleBody(): string{
        return $this->body;
    }
    function getArticleImage(): string{
        return $this->image;
    }
    function setTitle(string $input){
        $this->title = $input;
    }
    function setSubtitle(string $input){
        $this->subtitle = $input;
    }
    function setCreatedAt(Datetime $input){
        $this->createdAt = $input;
    }
    function setAuthor(string $input){
        $this->author = $input;
    }
    function setBody(string $input){
        $this->body = $input;
    }
    function setImage(string $input){
        $this->image = $input;
    }
    
}

