<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\AnimationFormType;
use App\Entity\Animation;
use App\Entity\Images;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;


class AnimationController extends AbstractController
{
    /**
     * @Route("/animation", name="app_animation")
     */
    public function new(Request $request , SluggerInterface $slugger)
    {
             // creates a task object and initializes some data for this example
             $animation = new Animation();
             $form = $this->createForm(AnimationFormType::class, $animation);
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
                    $animation->setImage($newFilename);
                }
           $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($animation);
                $entityManager->flush();
       
               return $this->redirectToRoute('home');

        }
    
        return $this->render('animation/animation.html.twig', [
            'AnimationForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/TabAnimation", name="app_TabAnimation")
     */
    public function AfficheAnimation() {
        $animations = $this->getDoctrine()
        ->getRepository(Animation::class)
        ->findAll();
        
        return $this->render('TabAnimation/TabAnimation.html.twig', [
            'animations' => $animations
        ]);
    }
}
