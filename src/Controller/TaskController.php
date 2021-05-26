<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\Type\TaskType;
use App\Entity\Task;

class TaskController extends AbstractController
{
    /**
     * @Route("/new", name="task_new")
     */
    public function new()
    {
             // creates a task object and initializes some data for this example
             $task = new Task();
            // $task->setTask('Write a blog post');
            // $task->setDueDate(new \DateTime('tomorrow'));
     
             $form = $this->createForm(TaskType::class, $task);

        return $this->render('task/new.html.twig', [
            'form1' => $form->createView(),
        ]);
    }
}
