<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Employe;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Lieu;

class EmployeController extends AbstractController
{
    #[Route('/employe/voir/{id}', name: 'voir')]
    Public function voir(ManagerRegistry $doctrine, int $id): Response {
        $employe = $doctrine->getRepository(Employe::class)->find($id);
        $titre = "employés numéro " . $id;
        return $this->render('principal/voir.html.twig', compact('titre', 'employe'));
    }
}