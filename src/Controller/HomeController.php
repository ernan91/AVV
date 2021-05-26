<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController', 'TEST' => 'ERWAN',
        ]);
    }
     /**
     * @Route("/test", name="test")
     */
    public function test()
    {
        $tableau = [ "bonjour,",12,13,14];
        return $this->render('home/test.html.twig', ["tableau" => $tableau]);
    
    }
}
