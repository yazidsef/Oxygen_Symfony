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
    public function index(CourseRepository $CourseRepository): Response
    {
        $course=$CourseRepository->findAll();
        return $this->render('discipline/index.html.twig',['courses'=>$course]);
    }
}
