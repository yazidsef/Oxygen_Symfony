<?php

namespace App\Controller;

use App\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\DisciplineRepository;
use App\Repository\ApplicationRepository;
use App\Repository\CourseRepository;
use App\Repository\StudentRepository;
use App\Form\CourseType;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AdminCourseController extends AbstractController
{
    #[Route('/admin/formation', name: 'app_admin_course')]
    public function index(
        Request $request,
        DisciplineRepository $disciplineRepository,
        CourseRepository $courseRepository,
        // Remove unused variables
        // StudentRepository $studentRepository,
        // ApplicationRepository $application,
        ValidatorInterface $validator,
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
        if ($form->isSubmitted()) {
            // get discipline id from the form
            $disId = $form->get('discipline')->getData();
            if ($disId) {
                $discipline = $disciplineRepository->findOneBy(['id' => $disId]);
                $course->setDiscipline($discipline);
            }
            $errors = $validator->validate($course);
            if (count($errors) > 0) {
                return $this->render(
                    'admin/formation/formation.html.twig',
                    [
                        'title' => 'Formation',
                        'courses' => $courses,
                        'disciplines' => $disciplines,
                        'disciplineId' => $disciplineId,
                        'totalCourses' => $totalCourses,
                        'form' => $form->createView(),
                        'errors' => $errors
                        ]
                );
            }
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

        // filter courses which related to application
        

        return $this->render('admin/formation/formation.html.twig', [
            'title' => 'Formation',
            'courses' => $courses,
            'disciplines' => $disciplines,
            'disciplineId' => $disciplineId,
            'totalCourses' => $totalCourses,
            'form' => $form,
        ]);
    }
}
