<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController{
    
    #[Route('home/homepage', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('principal/homepage.html.twig', [
            'controller_name' => "HomePage",
        ]);
    }
}