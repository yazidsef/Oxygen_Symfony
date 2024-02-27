<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DisciplineRepository;
use App\Repository\CourseRepository;
use App\Entity\Course;

class DisciplineController extends AbstractController
{
    #[Route('/discipline', name: 'app_discipline')]
    public function index(
        Request $request,
        CourseRepository $courseRepository,
        DisciplineRepository $disciplineRepository
    ): Response {
        $disciplineId = $request->query->getInt('discipline_id', 0);
        $courses = $disciplineId ?
            $courseRepository->findByDisciplineId($disciplineId) :
            $courseRepository->findAll();
        $disciplines = $disciplineRepository->findAll();
        return $this->render('discipline/index.html.twig', [
            'courses' => $courses,
            'disciplines' => $disciplines,
            'disciplineId' => $disciplineId
        ]);
    }
}
