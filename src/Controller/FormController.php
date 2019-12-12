<?php

namespace App\Controller;

use App\Entity\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\QuestionRepository;

class FormController extends AbstractController
{
    /**
     * @Route("/form/{id}", name="form")
     */
    public function index($id, Request $request, QuestionRepository $questionRepository){
        if ($id < 1) {
            return $this->redirectToRoute('form', ['id' => 1]);
        }

        $questions = $questionRepository->findAll();
        $question = $questionRepository->find($id);
                
        if ($question === null) {
            // Go to endpage
        }

        return $this->render('survey/fillsurvey.html.twig', [
            'controller_name' => 'FormController',
            'id' => $id,
            'length' => count($questions),
            'question' => $questions
        ]);
    }
}
