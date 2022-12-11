<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
    
    public function demandeContact (Request $request){
        $contact = new Contact();
        $form= $this->createFormBuilder($contact)
                ->add('titre',ChoiceType::class, array('choices'=>array(
                    'Monsieur' => 'M',
                    'Madame' => 'F',
                ),'multiple'=> false,
                    'expanded' => true,
                    ))
                ->add('nom',TextType::class,
                        array(
                            'label' => 'Nom : ',
                            'required' => true,
                        ))
                ->add('mail', EmailType::class,
                        array(
                            'label' => 'Mail : ',
                            'required' => true,
                        ))
                ->add('tel', TelType::class,
                        array(
                            'label' => 'Téléphone : ',
                            'required' => true,
                        ))
                ->add('Envoyer', SubmitType::class)
                ->getForm();
        return $this->render("contact/contact.html.twig",
                ['formContact'=>$form->createView(),
                    'titre'=>'Formulaire de contact']);
    }
}
