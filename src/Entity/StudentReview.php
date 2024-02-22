<?php

namespace App\Entity;

use App\Repository\StudentReviewRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use App\Entity\Student;

#[ORM\Entity(repositoryClass: StudentReviewRepository::class)]
class StudentReview
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'studentReview', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(name: 'student_id', referencedColumnName: 'id')]
    private ?Student $student = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $testimonial = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getTestimonial(): ?string
    {
        return $this->testimonial;
    }

    public function setTestimonial(string $testimonial): self
    {
        $this->testimonial = $testimonial;

        return $this;
    }
}
