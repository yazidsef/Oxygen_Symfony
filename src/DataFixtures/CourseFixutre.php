<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Course;
use DateTime;

class CourseFixutre extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $courses = require 'src/Data/Courses.php';

        // Verify that $courses is an array
        if (is_array($courses)) {
            foreach ($courses as $key => $courseData) {
                $course = (new Course())
                    ->setDiscipline($this->getReference('discipline_' . $courseData['discipline_id']))
                    ->setName($courseData['name'])
                    ->setDescription($courseData['description'])
                    ->setUrlImage($courseData['url_image'])
                    ->setCapacity($courseData['capacity'])
                    ->setDuration($courseData['duration'])
                    ->setDate(new DateTime($courseData['date']))
                    ->setDegree($courseData['degree'])
                    ->setLocation($courseData['location'])
                    ->setFinancingSupport($courseData['financing_support']);

                $manager->persist($course);
                $this->addReference("course_$key", $course);
            }
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [DisciplineFixture::class];
    }
}
