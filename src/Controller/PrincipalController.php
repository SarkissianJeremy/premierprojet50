<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;



class PrincipalController extends AbstractController
{
    #[Route('/principal', name: 'app_principal')]
    public function index(): Response
    {
        return $this->render('principal/index.html.twig', [
            'controller_name' => "Symfony c'est super",
        ]);
    }
    
    #[Route('/welcome/{nom}', name: 'welcome')]
    public function welcome(string $nom)
    {
        return $this->render('principal/welcome.html.twig', array(
            "nom" => $nom
        ));
    }
    #[Route('/message/{departement}/{sexe}', name: 'message')]
    public function message(string $departement, string $sexe)
    {
        if($sexe == "M"){
        $sexe = "un garcon";
        
        }
        else if($sexe == "F"){
            $sexe = "une fille";
        }
        else{
            $sexe = "autre";
        }
        return $this->render('principal/message.html.twig', array(
            "departement" => $departement,
            "sexe" =>$sexe           
        ));
        
    }
    #[Route('/employes', name: 'employes')]
    public function afficheEmployes(ManagerRegistry $doctrine): Response{
        $employes = $doctrine->getRepository(Employe::class)->findAll();
        $titre = "Liste des employés";
        return $this->render('principal/employes.html.twig', compact('titre', 'employes'));
    }
    
     #[Route('/employe/{id}', name: 'employe')]
    public function afficheUnEmploye(ManagerRegistry $doctrine, int $id): Response{
        $employe = $doctrine->getRepository(Employe::class)->find($id);
        $titre = "employés n° " . $id;
        return $this->render('principal/unemploye.html.twig', compact('titre', 'employe'));
    }
}
