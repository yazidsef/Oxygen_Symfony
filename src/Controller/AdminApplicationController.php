<?php

namespace App\Controller;

use App\Entity\Application;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ApplicationRepository;

class AdminApplicationController extends AbstractController
{
    #[Route('/admin/application', name: 'app_admin_application')]
    public function index(
        ApplicationRepository $applicationRepos,
    ): Response {
        $applications = $applicationRepos->findAll();
        $totalApplications = count($applications);

        return $this->render('admin/application/application.html.twig', [
            'title' => 'Applications',
            'applications' => $applications,
            'totalApplications' => $totalApplications,
        ]);
    }
}
