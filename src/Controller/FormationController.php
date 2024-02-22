<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CourseRepository;
use App\Entity\Course;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
class FormationController extends AbstractController
{
    #[Route('/formation/', name: 'app_formation')]
    public function index(CourseRepository $courseRepository): Response
    {
        $course=$courseRepository->findBy($_GET);
        $courseArray = array_shift($course);
        return $this->render('formation/index.html.twig',['formation'=>$courseArray]);
    }
}
