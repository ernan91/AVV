<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\TypeActiviteFormType;
use App\Entity\TypeActivite;
use Symfony\Component\BrowserKit\Response;

class TypeActiviteController extends AbstractController
{
    /**
     * @Route("/type_activite", name="app_type_activite")
     */
    public function new(Request $request)
    {
             // creates a task object and initializes some data for this example
             $typeactivite = new TypeActivite();
     
             $form = $this->createForm(TypeActiviteFormType::class, $typeactivite);
            

             $form->handleRequest($request);
             if ($form->isSubmitted() && $form->isValid()) {
                 // $form->getData() holds the submitted values
                 // but, the original `$task` variable has also been update
         
                 // ... perform some action, such as saving the task to the database
                  $entityManager = $this->getDoctrine()->getManager();
                  $entityManager->persist($typeactivite);
                  $entityManager->flush();
         
                 return $this->redirectToRoute('home');
             }


        return $this->render('type_activite/type_activite.html.twig', [
            'TypeActiviteForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/ToutTypeactivite", name="app_ToutTypeactivite")
     */
    public function AfficheTypeActivite() {
        $typeactivite = $this->getDoctrine()
        ->getRepository(TypeActivite::class)
        ->findAll();
        dd($typeactivite);
    }
}
