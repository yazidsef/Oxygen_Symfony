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

        for ($i = 0; $i < 8; $i++) {
            $courses = $this->getReference('course_' . rand(0, 15));
            $application = (new Application())
                ->setCourse($courses)
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setTel(123456789)
                ->setEmail($faker->email)
                ->setDegree($degrees[array_rand($degrees)])
                ->setAge(rand(18, 60))
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
