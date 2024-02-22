<?php

namespace App\DataFixtures;

use App\Entity\StudentReview;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\StudentFixtures;

class StudentReviewFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // Ensure that the file exists and is readable
        $filePath = 'src/Data/StudentReviews.php';
        $studentReviews = require $filePath;

        // Verify that $studentReviews is an array
        if (is_array($studentReviews)) {
            foreach ($studentReviews as $studentReviewData) {
                // Get the Student entity by its ID
                $studentId = $studentReviewData['student_id'];
                $student = $this->getReference("student_$studentId");

                // Create a new StudentReview entity
                $studentReview = (new StudentReview())
                    ->setStudent($student)
                    ->setTestimonial($studentReviewData['testimonial']);

                // Persist the StudentReview entity
                $manager->persist($studentReview);
            }
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            StudentFixtures::class, // Specify the class name of the StudentFixtures
        ];
    }
}
