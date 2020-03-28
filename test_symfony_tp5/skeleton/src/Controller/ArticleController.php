<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles/{id}", name="show")
     * @param $id
     * @return rendu twig
     */
    public function show(Article $article)
    {
//        $article = $this->articleRepository->find($id);
        return $this->render('article/show.html.twig', [
            'article' => $article
        ]);
    }
    
//    private $articleRepository;
//
//    public function __construct(ArticleRepository $articleRepository)
//    {
//        $this->articleRepository = $articleRepository;
//    }
}
