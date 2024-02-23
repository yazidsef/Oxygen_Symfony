<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Discipline;
use Faker\Factory;

class DisciplineFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $disciplines = require 'src/Data/Disciplines.php';

        // Verify that $disciplines is an array
        if (is_array($disciplines)) {
            foreach ($disciplines as $key => $disciplineData) {
                $key = $key + 1;
                $discipline = (new Discipline())
                    ->setIcon($disciplineData['icon'])
                    ->setName($disciplineData['name'])
                    ->setDescription($disciplineData['description'])
                    ->setUrlImage($disciplineData['url_image']);

                $manager->persist($discipline);
                $this->addReference("discipline_$key", $discipline);
            }
        }
        $manager->flush();
    }
}
