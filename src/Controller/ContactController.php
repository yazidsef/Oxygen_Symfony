<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormulaireType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        // Create a new instance of Contact entity
        $contact = new Contact();

        // Create the form using the ContactFormulaireType form type
        $contactForm = $this->createForm(ContactFormulaireType::class, $contact);

        // Handle the request
        $contactForm->handleRequest($request);

        // Check if the form is submitted and valid
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            // Persist the contact entity
            $contact = $contactForm->getData();
            $entityManager->persist($contact);
            $entityManager->flush();

            // Add success flash message
            $this->addFlash('success', 'Merci ! Nous avons bien reçu votre message, 
            nous vous répondrons dans les plus brefs délais.');

            // Redirect to the contact page to clear the form
            return $this->redirectToRoute('app_contact');
        }

        // Render the form
        return $this->render('contact/contact.html.twig', [
            'form' => $contactForm->createView(),
        ]);
    }
}
