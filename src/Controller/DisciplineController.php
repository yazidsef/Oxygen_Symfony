<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DisciplineController extends AbstractController
{
    #[Route('/discipline', name: 'app_discipline')]
    public function index(): Response
    {
        return $this->render('discipline/index.html.twig');
    }
}
