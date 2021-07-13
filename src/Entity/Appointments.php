<?php

namespace App\Entity;

use App\Repository\AppointmentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppointmentsRepository::class)
 */
class Appointments
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $startTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $endTime;

    /**
     * @ORM\ManyToOne(targetEntity=Patients::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $patients;
    //private $patients_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartTime(): ?\DateTimeInterface
    {
        return $this->startTime;
    }

    public function setStartTime(\DateTimeInterface $startTime): self
    {
        $this->startTime = $startTime;

        return $this;
    }

    public function getEndTime(): ?\DateTimeInterface
    {
        return $this->endTime;
    }

    public function setEndTime(\DateTimeInterface $endTime): self
    {
        $this->endTime = $endTime;

        return $this;
    }

   public function getPatients()
   {
       return $this->patients;
   }

   public function setPatients($patients)
   {
       $this->patients = $patients;

       return $this;
   }

//  public function getPatientsId(){
//       return $this->patients_id;
//   }
//   public function setPatientsId($patientsId) : self
//   {
//       $this->patients_Id = $patientsId;
//
//       return $this;
//   }
}
