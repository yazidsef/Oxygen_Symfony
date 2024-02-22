<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Course;
use App\DataFixtures\DisciplineFixtures;
use Faker\Factory;

class CourseFixutre extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 10; $i < 20; $i++) {
            $faker = Factory::create();
            $course = new Course();
            $course->setDiscipline($this->getReference('discipline_' . $faker->numberBetween(0, 15)));
            $course->setName($faker->word());
            $course->setDescription($faker->paragraph());
            $course->setUrlImage($faker->imageUrl());
            $course->setCapacity($faker->numberBetween(10, 100));
            $course->setDuration($faker->numberBetween(1, 12) . ' ' . $faker->randomElement(['months','weeks','days']));
            $course->setDate($faker->dateTimeBetween('-1 years', 'now'));
            $course->SetDegree($faker->randomElement(['Bac+2','Bac+3','Bac+5']));
            $course->setLocation($faker->city());
            $course->setFinancingSupport($faker->numberBetween(50, 100));
            $manager->persist($course);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [DisciplineFixture::class];
    }
}
