<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\DisciplineRepository;


class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        DisciplineRepository $disciplineRepository
    ): Response
    {
        // load all disciplines
        // ...  
        $disciplines = $disciplineRepository->findAll();
        return $this->render('home/index.html.twig', 
        [
            'disciplines' => $disciplines,
        ]);
    }
}
