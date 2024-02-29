<?php

namespace App\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class AdminContactController extends AbstractController
{
    #[Route('/admin/contact', name: 'app_admin_contact')]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $avatars = require __DIR__ . '/../Data/Avatars.php';
        shuffle($avatars);

        $contacts = $entityManager->getRepository(Contact::class)->findAll();
        $totalContacts = count($contacts);

        $newContacts = [];
        foreach ($contacts as $contact) {
            if (!empty($avatars)) {
                $randomAvatar = array_shift($avatars)['avatar_image'];
                $newContacts[] = [
                    'contact' => $contact,
                    'avatarImage' => $randomAvatar
                ];
            }
        }

        return $this->render('admin/contact/contact.html.twig', [
            'title' => 'Contacts',
            'contacts' => $newContacts,
            'totalContacts' => $totalContacts,
        ]);
    }
}