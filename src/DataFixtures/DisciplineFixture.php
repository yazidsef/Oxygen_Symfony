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
       
        $faker=Factory::create();

        for($i=0; $i<15;$i++){
            $disciplines = ['Informatique', 'Finance', 'Physics', 'Chemistry', 'Biology'];
            $discipline=new Discipline();
            $discipline->setIcon($faker->word());
            $discipline->setName($faker->randomElement($disciplines));
            $discipline->setDescription($faker->paragraph());
            $discipline->setUrnImage($faker->word());
            if ($this->hasReference('discipline_'.$i)) {
                $this->setReference('discipline_'.$i, $discipline);
            } else {
                $this->addReference('discipline_'.$i, $discipline);
            }
            $manager->persist($discipline);
            
        }
        $manager->flush();
    }
}
