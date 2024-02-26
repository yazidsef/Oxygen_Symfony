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
        $avatars = require 'src/Data/Avatars.php';

        foreach ($messages as $i => $message) {
            $avatarUrl = $avatars[$i % count($avatars)];

            $contact = (new Contact())
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setPhone(123456789)
                ->setEmail($faker->email)
                ->setMessage($message['message'])
                ->setAvatarImage($avatarUrl['avatar_image']);

            $manager->persist($contact);
        }

        $manager->flush();
    }
}