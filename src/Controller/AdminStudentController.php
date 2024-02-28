<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class AdminStudentController extends AbstractController
{
    #[Route('/admin/student', name: 'app_admin_student')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $students = $entityManager->getRepository(Student::class)->findAll();
        $totalStudents = count($students);

        // // Create student
        // $student = new Student();
        // $student->setCreatedAt(new \DateTime());
        // $student->setUpdatedAt(new \DateTime());
        // $student->setIsActive(true);
        // $entityManager->persist($student);
        // $entityManager->flush();

        // // Delete student
        // $studentId = $request->query->getInt('studentId', 0);
        // if ($studentId) {
        //     $student = $entityManager->getRepository(Student::class)->findOneBy(['id' => $studentId]);
        //     $entityManager->remove($student);
        //     $entityManager->flush();
        //     return $this->redirectToRoute('app_admin_student');
        // }

        return $this->render('admin/student/student.html.twig', [
            'title' => 'Students',
            'students' => $students,
            'totalStudents' => $totalStudents,
        ]);
    }
}