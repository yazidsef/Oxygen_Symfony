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
        // Your code to load student reviews
        $studentReviews = require __DIR__ . '/Data/student_reviews.php';

        foreach ($studentReviews as $studentReviewData) {
            $studentReview = (new StudentReview())
                ->setStudentId($studentReviewData['student_id'])
                ->setTestimonial($studentReviewData['testimonial']);
            $manager->persist($studentReview);
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
