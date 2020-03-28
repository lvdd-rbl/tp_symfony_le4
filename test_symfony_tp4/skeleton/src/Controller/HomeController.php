<?php

namespace App\Controller;

use http\Client\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use \DateTime;

use App\Repository\ArticleRepository;

class HomeController extends AbstractController
{
    private $articleRepository;
    
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
    
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
//        return $this->render('home/index.html.twig', [
//            'articles' => $this->articleRepository->findAll()
//        ]);
        
        return $this->render('home/index.html.twig', [
            'articles' => $this->articleRepository->findLast(4)
        ]);
    }
    
    
}
