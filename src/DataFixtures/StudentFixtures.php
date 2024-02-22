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
        // Ensure that the file exists and is readable
        $filePath = 'src/Data/Students.php';
        if (!file_exists($filePath)) {
            throw new \Exception("File '$filePath' not found.");
        }

        // Attempt to include the file
        $students = require $filePath;

        // Verify that $studentsData is an array
        if (!is_array($students)) {
            throw new \Exception("'$filePath' does not return an array.");
        }
        foreach ($students as $studentData) {
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
        }

        $manager->flush();
    }
}
