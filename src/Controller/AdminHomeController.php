<?php

namespace App\Controller;

use App\Entity\Course;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DisciplineRepository;
use App\Repository\StudentRepository;
use App\Repository\ContactRepository;
use App\Repository\ApplicationRepository;
use App\Repository\CourseRepository;

class AdminHomeController extends AbstractController
{
    #[Route('/admin', name: 'app_admin_home')]
    public function index(
        DisciplineRepository $discipline,
        CourseRepository $courseRepository,
        StudentRepository $studentRepository,
        ContactRepository $contactRepository,
        ApplicationRepository $application
    ): Response {
        $avatars = require __DIR__ . '/../Data/Avatars.php';
        shuffle($avatars);
        // load all disciplines
        $disciplines = $discipline->findAll();
        // load all students
        $students = $studentRepository->findAll();
        $totalStudent = count($students);
        // load all courses
        $courses = $courseRepository->findAll();
        $totalCourse = count($courses);
        // load all contacts
        $contacts = $contactRepository->findAll();
        // create a new contacts array with random avatar
        $newContacts = [];
        $recentContacts = array_slice(array_reverse($contacts), 0, 5);

        foreach ($recentContacts as $contact) {
            if (!empty($avatars)) {
                // Generate random avatar image for each contact
                $randomAvatar = array_shift($avatars)['avatar_image'];

                // Add contact data with random avatar image to the new array
                $newContacts[] = [
                    'contact' => $contact,
                    'avatarImage' => $randomAvatar
                ];
            }
        }
        // Reset the array pointer to the beginning
        reset($avatars);
        // load all applications
        $applications = $application->findAll();
        // create a new applications array with random avatar
        $newApplications = [];
        $recentApplications = array_slice(array_reverse($applications), 0, 6);

        foreach ($recentApplications as $application) {
            // Generate random avatar image for each application
            if (!empty($avatars)) {
                // Generate random avatar image for each application
                $randomAvatar = array_shift($avatars)['avatar_image'];

                // Add application data with random avatar image to the new array
                $newApplications[] = [
                    'application' => $application,
                    'avatarImage' => $randomAvatar
                ];
            }
        }

        return $this->render(
            'admin/home/dashboard.html.twig',
            [
            'title' => 'Dashboard',
            'disciplines' => $disciplines,
            'courses' => $courses,
            'totalCourse' => $totalCourse,
            'students' => $students,
            'totalStudent' => $totalStudent,
            'contacts' => $newContacts,
            'applications' => $newApplications,
            ]
        );
    }
}
