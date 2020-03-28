<?php

namespace App\Controller;

use http\Client\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use \DateTime;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
    
        $article1 = new Article();
        $article1->setTitle('Title 1');
        $article1->setSubtitle('SubTitle 1');
        $article1->setCreatedAt(new DateTime());
        $article1->setAuthor('John Doe');
        $article1->setBody('Lorem ipsum dolor sit amet');
        $article1->setImage('img/post-bg.jpg');
    
        $article2 = new Article();
        $article2->setTitle('Title 2');
        $article2->setSubtitle('SubTitle 2');
        $article2->setCreatedAt(new DateTime());
        $article2->setAuthor('John Doe');
        $article2->setBody('Lorem ipsum dolor sit amet');
        $article2->setImage('img/post-bg.jpg');
    
        return $this->render('home/index.html.twig', [
            'articles' => [$article1, $article2]
        ]);
    }
}
