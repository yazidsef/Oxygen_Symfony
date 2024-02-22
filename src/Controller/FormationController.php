<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Course;

class FormationController extends AbstractController
{
    #[Route('/formation/{id}/', name: 'app_formation')]
    public function show(Course $course): Response
    {
        return $this->render('formation/index.html.twig', ['formation' => $course]);
    }
}
