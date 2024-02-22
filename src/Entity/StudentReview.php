<?php

namespace App\Entity;

use App\Repository\StudentReviewRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: StudentReviewRepository::class)]
class StudentReview
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'studentReview', cascade: ['persist', 'remove'])]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $studentId = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $testimonial = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudentId(): ?int
    {
        return $this->studentId;
    }

    public function setStudentId(int $studentId): self
    {
        $this->studentId = $studentId;

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
