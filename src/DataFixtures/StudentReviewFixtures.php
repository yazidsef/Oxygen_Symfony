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
        if (!file_exists($filePath)) {
            throw new \Exception("File '$filePath' not found.");
        }

        // Attempt to include the file
        $studentReviews = require $filePath;

        // Verify that $studentReviews is an array
        if (!is_array($studentReviews)) {
            throw new \Exception("'$filePath' does not return an array.");
        }

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
