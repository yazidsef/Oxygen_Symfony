<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // add data to contact table

        $filePath = 'src/Data/Contacts.php';
        // Attempt to include the file
        $contacts = require $filePath;

        // Verify that $contacts is an array
        if (is_array($contacts)) {
            foreach ($contacts as $key => $contactData) {
                $contact = (new Contact())
                    ->setFirstName($contactData['firstName'])
                    ->setLastName($contactData['lastName'])
                    ->setEmail($contactData['email'])
                    ->setTel($contactData['tel'])
                    ->setMessage($contactData['message']);

                $manager->persist($contact);
                $this->addReference("contact_$key", $contact);
            }
        }

        $manager->flush();
    }
}
