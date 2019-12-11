<?php

namespace App\Controller;

use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{
    /**
     * @Route("/form/{id}", name="form")
     */
    public function index($id){
        if (isset($_POST['volgende'])){
            $id = $id + 1;
        }
        if (isset($_POST['vorige'])){
            $id = $id - 1;
        }

        $questions = $this->getDoctrine()->getRepository(Question::class)->find(['id' => $id]);

        return $this->render('survey/fillsurvey.html.twig', [
            'controller_name' => 'FormController',
            'id' => $id,
            'question' => $questions,
        ]);
    }
}
