<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ContactMessageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $messages = require 'src/Data/NewMessages.php';

        foreach ($messages as $message) {
            $contact = (new Contact())
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setPhone(123456789)
                ->setEmail($faker->email)
                ->setMessage($message['message']);

            $manager->persist($contact);
        }

        $manager->flush();
    }
}
