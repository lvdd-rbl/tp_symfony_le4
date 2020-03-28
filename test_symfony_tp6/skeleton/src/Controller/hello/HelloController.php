<?php

namespace App\Controller\hello;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HelloController extends AbstractController
{
    /**
     * @Route("/hello/{name}", name="hello_name")
     */
    public function helloName($name)
    {
        return new Response('Hello ' . $name);
    }
    
    /**
     * @Route("/hello", name="hello_world")
     */
    public function hello()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HelloController.php',
        ]);
        return new Response("Hello world");
    }
}
