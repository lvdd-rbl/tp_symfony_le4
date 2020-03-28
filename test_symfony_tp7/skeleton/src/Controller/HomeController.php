<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use \DateTime;
use Symfony\Component\HttpFoundation\Response;

use App\Repository\ArticleRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/{page}", name="home")
     */
    public function index($page)
    {
        $articles = $this->articleRepository->findAllPagine($page, 5);
        $pagination = array(
            'page' => $page,
            'nbPages' => ceil(count($articles) / 5),
            'nomRoute' => 'home',
            'paramsRoute' => array()
        );
        return $this->render('home/index.html.twig', [
            'articles' => $articles,
            'pagination' => $pagination
        ]);
    }
    
    private $articleRepository;
    
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
}
