<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\ActiviteFormType;
use App\Entity\Activite;
use App\Entity\Animation;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

class ActiviteController extends AbstractController
{
    /**
     * @Route("/activite", name="app_activite")
     */
    public function new(Request $request, SluggerInterface $slugger)
    {
             // creates a task object and initializes some data for this example
             $activite = new Activite();
     
             $form = $this->createForm(ActiviteFormType::class, $activite);
             $form->handleRequest($request);
            
             if ($form->isSubmitted() && $form->isValid()) {
                $brochureFile = $form->get('image')->getData();

                // this condition is needed because the 'brochure' field is not required
                // so the PDF file must be processed only when a file is uploaded
                if ($brochureFile) {
                    dump($brochureFile);
                $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                    
                    // this is needed to safely include the file name as part of the URL
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();
    
                    // Move the file to the directory where brochures are stored
                    try {
                        $brochureFile->move(
                            $this->getParameter('images_directory'),
                            $newFilename
                        );
                    } catch (FileException $e) {
                        // ... handle exception if something happens during file upload
                    }
    
                    // updates the 'brochureFilename' property to store the PDF file name
                    // instead of its contents
                    $activite->setImage($newFilename);
                }
           $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($activite);
                $entityManager->flush();
       
               return $this->redirectToRoute('home');

        }


        return $this->render('activite/activite.html.twig', [
            'ActiviteForm' => $form->createView(),
        ]);
    }
     /**
     * @Route("/Tab1Activite/{id}", name="app_Tab1Activite")
     */
    public function Affiche1Activite (Activite $activite) 
    {
     return $this->render('TabActivites/Tab1Activite.html.twig', [
         'activite' => $activite
     ]);
    }
    /**
     * @Route("/TabActivites/{id}", name="app_TabActivites")
     */
    public function AfficheActivites( Request $request, Animation $animation ) {
      /*  $activites = $this->getDoctrine()
        ->getRepository(Activite::class)
        ->findBy([]);
        */
        $activites=$animation->getActivites();
        return $this->render('TabActivites/TabActivite.html.twig', [
            'activites' => $activites
        ]);
    }

    

}
