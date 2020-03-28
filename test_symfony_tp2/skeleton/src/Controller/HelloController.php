<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use debug;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello", name="hello")
     */
    public function index()
    {
        /*return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HelloController.php',
        ]);*/
        //return new Response("Hello world");
        $user = [
            'name' => 'Lucas',
            'place' => 'Lens'
        ];
        dump($user); // nouvel onglet cible avec contenu de $user
        return $this->render('hello/index.html.twig', [
            'user' => $user,
        ]);
    }
}
