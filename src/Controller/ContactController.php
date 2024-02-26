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
    public function index(
        Request $request,
        ValidatorInterface $validator,
        EntityManagerInterface $entityManager
    ): Response {
        $avatars = require $this->getParameter('kernel.project_dir') . '/src/Data/Avatars.php';
        // creation nouveau contact
        $contact = (new Contact())
            ->setAvatarImage($avatars[rand(0, count($avatars) - 1)]['avatar_image']);

        // creation formulaire de contact
        $contactForm = $this->createForm(ContactFormulaireType::class, $contact);
        //  Traitement de la requete
        $contactForm->handleRequest($request);
        //  Verification de la soumission du formulaire

        if ($contactForm->isSubmitted()) {
            //  Validation des données
            $errors = $validator->validate($contact);
            //  Si il y a des erreurs
            if (count($errors) > 0) {
                return $this->render(
                    'contact/contact.html.twig',
                    [
                        'contact' => $contact,
                        'form' => $contactForm->createView(),
                        'errors' => $errors
                    ]
                );
            }
            $entityManager->persist($contact);
            $entityManager->flush();

        //  Message de confirmation
            $this->addFlash('success', 'Merci ! nous avons bien reçu votre message, 
            nous vous répondrons dans les plus brefs délais.');
        //redirection vers la page de contact
            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/contact.html.twig', [
            'contact' => $contact,
            'form' => $contactForm
        ]);
    }
}
