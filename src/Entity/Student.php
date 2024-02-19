<?php

namespace App\Entity;

use App\Repository\StudentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StudentRepository::class)]
class Student
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'students')]
    #[ORM\JoinColumn(nullable: false)]
    private ?course $course = null;

    #[ORM\Column(length: 150)]
    private ?string $firstName = null;

    #[ORM\Column(length: 150)]
    private ?string $lastName = null;

    #[ORM\Column]
    private ?int $tel = null;

    #[ORM\Column(length: 150)]
    private ?string $degree = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $birthday = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column(length: 255)]
    private ?string $avatarImage = null;

    #[ORM\Column(length: 255)]
    private ?string $formation = null;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: NewMessages::class)]
    private Collection $newMessages;

    #[ORM\ManyToOne(inversedBy: 'student')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Applications $applications = null;

    public function __construct()
    {
        $this->newMessages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCourse(): ?course
    {
        return $this->course;
    }

    public function setCourse(?course $course): static
    {
        $this->course = $course;

        return $this;
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

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): static
    {
        $this->adress = $adress;

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

    /**
     * @return Collection<int, NewMessages>
     */
    public function getNewMessages(): Collection
    {
        return $this->newMessages;
    }

    public function addNewMessage(NewMessages $newMessage): static
    {
        if (!$this->newMessages->contains($newMessage)) {
            $this->newMessages->add($newMessage);
            $newMessage->setStudent($this);
        }

        return $this;
    }

    public function removeNewMessage(NewMessages $newMessage): static
    {
        if ($this->newMessages->removeElement($newMessage)) {
            // set the owning side to null (unless already changed)
            if ($newMessage->getStudent() === $this) {
                $newMessage->setStudent(null);
            }
        }

        return $this;
    }

    public function getApplications(): ?Applications
    {
        return $this->applications;
    }

    public function setApplications(?Applications $applications): static
    {
        $this->applications = $applications;

        return $this;
    }
}
