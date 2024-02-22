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

    #[Assert\NotBlank]
    #[Assert\Length(max: 55)]
    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    #[ORM\Column(length: 150)]
    private ?string $lastName = null;

    #[Assert\NotBlank]
    #[ORM\Column]
    private ?int $tel = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 150)]
    private ?string $degree = null;

    #[Assert\NotBlank]
    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $birthday = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 200)]
    private ?string $address = null;

    #[Assert\NotBlank]
    #[ORM\Column(length: 255)]
    private ?string $avatarImage = null;

    #[ORM\Column(length: 150)]
    private ?string $formation = null;

    #[ORM\OneToMany(mappedBy: 'student', targetEntity: NewMessage::class)]
    private Collection $newMessages;

    #[ORM\OneToOne(mappedBy: 'student', cascade: ['persist', 'remove'])]
    private ?StudentReview $studentReview = null;

    #[ORM\ManyToMany(targetEntity: Application::class, mappedBy: 'students')]
    private Collection $applications;

    public function __construct()
    {
        $this->newMessages = new ArrayCollection();
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

    /**
     * @return Collection<int, NewMessage>
     */
    public function getNewMessages(): Collection
    {
        return $this->newMessages;
    }

    public function addNewMessage(NewMessage $newMessage): static
    {
        if (!$this->newMessages->contains($newMessage)) {
            $this->newMessages->add($newMessage);
            $newMessage->setStudent($this);
        }

        return $this;
    }

    public function removeNewMessage(NewMessage $newMessage): static
    {
        if ($this->newMessages->removeElement($newMessage)) {
            // set the owning side to null (unless already changed)
            if ($newMessage->getStudent() === $this) {
                $newMessage->setStudent(null);
            }
        }

        return $this;
    }

    public function getStudentReview(): ?StudentReview
    {
        return $this->studentReview;
    }

    public function setStudentReview(StudentReview $studentReview): static
    {
        // set the owning side of the relation if necessary
        if ($studentReview->getStudent() !== $this) {
            $studentReview->setStudent($this);
        }

        $this->studentReview = $studentReview;

        return $this;
    }

    /**
     * @return Collection<int, Application>
     */
    public function getApplications(): Collection
    {
        return $this->applications;
    }

    public function addApplication(Application $application): static
    {
        if (!$this->applications->contains($application)) {
            $this->applications->add($application);
            $application->addStudent($this);
        }

        return $this;
    }

    public function removeApplication(Application $application): static
    {
        if ($this->applications->removeElement($application)) {
            $application->removeStudent($this);
        }

        return $this;
    }
}
