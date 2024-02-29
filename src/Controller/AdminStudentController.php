<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\StudentRepository;

class AdminStudentController extends AbstractController
{
    #[Route('/admin/student', name: 'app_admin_student')]
    public function index(
        Request $request,
        StudentRepository $studentRepository,
    ): Response {
        $students = $studentRepository->findAll();
        $totalStudents = count($students);

        return $this->render('admin/student/student.html.twig', [
            'title' => 'Students',
            'students' => $students,
            'totalStudents' => $totalStudents,
        ]);
    }
}
