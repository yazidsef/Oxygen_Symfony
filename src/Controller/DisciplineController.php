<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DisciplineRepository;
use App\Repository\CourseRepository;
use App\Entity\Course;

class DisciplineController extends AbstractController
{
    #[Route('/discipline', name: 'app_discipline')]
    public function index(
        CourseRepository $courseRepository,
        DisciplineRepository $disciplineRepository
    ): Response {
        $courses = $courseRepository->findAll();
        $disciplines = $disciplineRepository->findAll();
        $filteredCourses = $courses;
        $disciplineId = isset($_GET['discipline_id']) ? intval($_GET['discipline_id']) : null;
        if ($disciplineId) {
            $filteredCourses = array_filter($courses, function (Course $course) use ($disciplineId) {
                return $course->getDiscipline()->getId() === $disciplineId;
            });
        }
        return $this->render('discipline/index.html.twig', [
            'courses' => $filteredCourses,
            'disciplines' => $disciplines,
            'disciplineId' => $disciplineId
        ]);
    }
}
