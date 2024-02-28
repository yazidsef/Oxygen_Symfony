<?php

namespace App\Controller;

use App\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\DisciplineRepository;
use App\Repository\CourseRepository;
use App\Form\CourseType;

class AdminCourseController extends AbstractController
{
    #[Route('/admin/formation', name: 'app_admin_course')]
    public function index(
        Request $request,
        DisciplineRepository $disciplineRepository,
        CourseRepository $courseRepository,
        EntityManagerInterface $entityManager
    ): Response {
        $disciplineId = $request->query->getInt('discipline_id', 0);
        $courses = $disciplineId ?
            $courseRepository->findByDisciplineId($disciplineId) :
            $courseRepository->findAll();
        $disciplines = $disciplineRepository->findAll();
        $totalCourses = $courseRepository->count([]);

        // Create course and edit course
        $course = new Course();
        $form = $this->createForm(CourseType::class, $course);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $course->setDiscipline($disciplineRepository->find($form->get('discipline')->getData()));
            $entityManager->persist($course);
            $entityManager->flush();

            return $this->redirectToRoute('app_admin_course');
        }

        // Delete course
        $courseId = $request->query->getInt('courseId', 0);
        if ($courseId) {
            $course = $courseRepository->findOneBy(['id' => $courseId]);
            $entityManager->remove($course);
            $entityManager->flush();
            return $this->redirectToRoute('app_admin_course');
        }

        return $this->render('admin/formation/formation.html.twig', [
            'title' => 'Formation',
            'courses' => $courses,
            'disciplines' => $disciplines,
            'disciplineId' => $disciplineId,
            'totalCourses' => $totalCourses,
            'form' => $form->createView(),
        ]);
    }
}
