<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use DateTime;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // add data to student table

        $filePath = 'src/Data/Students.php';
        // Attempt to include the file
        $students = require $filePath;

        // Verify that $students is an array
        if (is_array($students)) {
            foreach ($students as $key => $studentData) {
                $student = (new Student())
                    ->setFirstName($studentData['firstName'])
                    ->setLastName($studentData['lastName'])
                    ->setEmail($studentData['email'])
                    ->setTel($studentData['tel'])
                    ->setDegree($studentData['degree'])
                    ->setBirthday(new DateTime($studentData['birthday']))
                    ->setAddress($studentData['address'])
                    ->setFormation($studentData['formation'])
                    ->setAvatarImage($studentData['avatar_image']);

                $manager->persist($student);
                $this->addReference("student_$key", $student);
            }
        }

        $manager->flush();
    }
}
