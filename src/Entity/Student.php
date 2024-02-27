<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank(message: 'Entrez votre prénom svp')]
    #[Assert\Length(max: 55)]
    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[Assert\NotBlank(message: 'Entrez votre nom svp')]
    #[Assert\Length(max: 55)]
    #[ORM\Column(length: 150)]
    private ?string $lastName = null;

    #[Assert\NotBlank(message: 'Entrez votre email svp')]
    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[Assert\NotBlank(message: 'Entrez votre numéro de téléphone svp')]
    #[ORM\Column]
    private ?int $tel = null;

    #[Assert\NotBlank(message: 'Entrez votre diplôme svp')]
    #[ORM\Column(length: 150)]
    private ?string $degree = null;

    #[Assert\NotBlank(message: 'Entrez votre date de naissance svp')]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $address = null;


    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avatarImage = null;

    #[ORM\Column(length: 150)]
    private ?string $formation = null;

    #[ORM\OneToOne(mappedBy: 'student', cascade: ['persist', 'remove'])]
    private ?StudentReview $studentReview = null;

    #[ORM\ManyToMany(targetEntity: Application::class, mappedBy: 'students')]
    private Collection $applications;

    public function __construct()
    {
        $this->applications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(int $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getDegree(): ?string
    {
        return $this->degree;
    }

    public function setDegree(string $degree): static
    {
        $this->degree = $degree;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): static
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getAvatarImage(): ?string
    {
        return $this->avatarImage;
    }

    public function setAvatarImage(string $avatarImage): static
    {
        $this->avatarImage = $avatarImage;

        return $this;
    }

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function setFormation(string $formation): static
    {
        $this->formation = $formation;

        return $this;
    }

    public function getStudentReview(): ?StudentReview
    {
        return $this->studentReview;
    }
}
