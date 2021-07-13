<?php

namespace App\Entity;

use App\Repository\PatientsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PatientsRepository::class)
 * @UniqueEntity("lastname", "firstname", "birthDate"),
 * message="Ce patient existe déjà"
 */
class Patients
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank
     * @Assert\Regex(
     * pattern="/^[a-zA-ZÀ-ÿ\-\ ]*$/",
     * message="Le nom doit contenir uniquement des lettres."
     * )
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank
     * @Assert\Regex(
     * pattern="/^[a-zA-ZÀ-ÿ\-\ ]*$/",
     * message="Le prénom ne peut pas contenir de chiffre."
     * )
     */
    private $firstname;

    /**
     * @ORM\Column(type="date")
     */
    private $birthDate;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=11)
     * @Assert\Regex(
     * pattern="/^[12][0-9]{10}$/",
     * message="Le numéro de carte vital commence par un 1 ou un 2 et contient au total 11 chiffres."
     * )
     */
    private $vitalCardNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = mb_strtoupper($lastname);
    
        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getBirthDate(): ?\DateTimeInterface
    {
        return $this->birthDate;
    }

    public function setBirthDate(\DateTimeInterface $birthDate): self
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getVitalCardNumber(): ?string
    {
        return $this->vitalCardNumber;
    }

    public function setVitalCardNumber(string $vitalCardNumber): self
    {
        $this->vitalCardNumber = $vitalCardNumber;

        return $this;
    }
}
