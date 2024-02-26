<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DisciplineRepository;
use App\Repository\StudentReviewRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        DisciplineRepository $disciplineRepository,
        StudentReviewRepository $studentReview
    ): Response {
        // load all disciplines
        $disciplines = $disciplineRepository->findAll();

        // load all student reviews
        $reviews = $studentReview->findAllWithStudents();

        return $this->render(
            'home/index.html.twig',
            [
            'disciplines' => $disciplines,
            'reviews' => $reviews,
            ]
        );
    }
}
