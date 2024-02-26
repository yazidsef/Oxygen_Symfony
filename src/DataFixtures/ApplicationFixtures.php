<?php

namespace App\DataFixtures;

use App\Entity\Application;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker\Factory;
use App\DataFixtures\CourseFixtures;

class ApplicationFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();
        $statuses = ['pending', 'accepted', 'rejected'];
        $degrees = ['Bachelor', 'Bac +2', 'Bac +3', 'Bac +4', 'Bac +5'];
        $avatars = require 'src/Data/Avatars.php';

        for ($i = 0; $i < 8; $i++) {
            $courses = $this->getReference('course_' . rand(0, 15));
            $avatarUrl = $avatars[$i % count($avatars)];
            $application = (new Application())
                ->setCourse($courses)
                ->setAvatarImage($avatarUrl['avatar_image'])
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setTel(123456789)
                ->setEmail($faker->email)
                ->setDegree($degrees[array_rand($degrees)])
                ->setBirthday($faker->dateTimeBetween('-30 years', '-20 years'))
                ->setMessage($faker->text)
                ->setStatus($statuses[array_rand($statuses)]);

            $manager->persist($application);
            $this->addReference("application_$i", $application);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CourseFixtures::class,
        ];
    }
}
