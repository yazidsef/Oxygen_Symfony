<?php

namespace App\Controller;

use App\Entity\Application;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Course;
use App\Form\FormulaireType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class FormationController extends AbstractController
{
    #[Route('/formation/{id}/', name: 'app_formation')]
    public function show(
        Course $course,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $application = (new Application())
            ->setCourse($course)
            ->setStatus('pending');

        $form = $this->createForm(FormulaireType::class, $application);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $application = $form->getData();
            $entityManager->persist($application);
            $entityManager->flush();
            return $this->redirectToRoute('app_discipline');
        }

        return $this->render('formation/index.html.twig', [
            'formation' => $course,
            'form' => $form->createView(),
        ]);
    }
}
