<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactFormulaireType;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // creation nouveau contact
        $contact = new Contact();
        // creation formulaire de contact
        $contactForm = $this->createForm(ContactFormulaireType::class, $contact);
        //  Traitement de la requete
        $contactForm->handleRequest($request);
        //  Verification de la soumission du formulaire

        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $entityManager->persist($contact);
            $entityManager->flush();
        
        //  Message de confirmation
            $this->addFlash('success', 'Merci ! nous avons bien reçu votre message, 
            nous vous répondrons dans les plus brefs délais.');
        //redirection

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/contact.html.twig', ['contact' => $contact , 'form' => $contactForm]);
    }
}
