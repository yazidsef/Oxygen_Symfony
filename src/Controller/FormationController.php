<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Course;
use App\Form\FormulaireType;
class FormationController extends AbstractController
{
    #[Route('/formation/{id}/', name: 'app_formation')]
    public function show(Course $course): Response
    {
        $student= new Student();
        $form = $this->createForm(FormulaireType::class, $student);
        return $this->render('formation/index.html.twig', ['formation' => $course , 'form' => $form]);
    }
}
