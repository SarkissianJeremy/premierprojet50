<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Employe;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Lieu;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EmployeController extends AbstractController
{
    #[Route('/employe/voir/{id}', name: 'voir')]
    Public function voir(ManagerRegistry $doctrine, int $id): Response {
        $employe = $doctrine->getRepository(Employe::class)->find($id);
        $titre = "employés numéro " . $id;
        return $this->render('principal/voir.html.twig', compact('titre', 'employe'));
    }
    
    #[Route('/employe/voirnomb/{nom}', name: 'voirnomb', requirements:["nom"=>"[B][a-zàéèêçîô-]*"], options:["utf8"=> true])]
    Public function voirnomb(string $nom): Response {
                return $this->render('principal/voirnomb.html.twig', array(
            "nom" => $nom
        ));
    }
    
    public function redirection(string $nom): RedirectionResponse{
        return $this->redirectToRoute("employe_voirnomb", ['nom'=>"Bond"]);
    }
    
    
    #[Route('/employe/{_locale}/cv', name: 'cv', requirements:["_locale" => "fr|en"], defaults:["_locale"=>"fr"])]
    public function cv(string $langue):response {
        if ($langue == "fr"){
            return $this->render("cvfr.pdf");
        }else{
            return $this->render("principal/cven.pdf");
        }


    }
    
        
        
    
}