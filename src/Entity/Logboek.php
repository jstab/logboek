<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LogboekRepository")
 */
class Logboek
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $brief_nr;

    /**
     * @ORM\Column(type="date")
     */
    private $datum;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chauffeur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Truck")
     * @ORM\JoinColumn(nullable=false)
     */
    private $truck;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $kubs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $laadplaats;

    /**
     * @ORM\Column(type="time")
     */
    private $vertrektijd;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bestemming;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $evenement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBriefNr(): ?int
    {
        return $this->brief_nr;
    }

    public function setBriefNr(int $brief_nr): self
    {
        $this->brief_nr = $brief_nr;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getChauffeur(): ?User
    {
        return $this->chauffeur;
    }

    public function setChauffeur(?User $chauffeur): self
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }

    public function getTruck(): ?Truck
    {
        return $this->truck;
    }

    public function setTruck(?Truck $truck): self
    {
        $this->truck = $truck;

        return $this;
    }

    public function getKubs()
    {
        return $this->kubs;
    }

    public function setKubs($kubs): self
    {
        $this->kubs = $kubs;

        return $this;
    }

    public function getLaadplaats(): ?string
    {
        return $this->laadplaats;
    }

    public function setLaadplaats(string $laadplaats): self
    {
        $this->laadplaats = $laadplaats;

        return $this;
    }

    public function getVertrektijd(): ?\DateTimeInterface
    {
        return $this->vertrektijd;
    }

    public function setVertrektijd(\DateTimeInterface $vertrektijd): self
    {
        $this->vertrektijd = $vertrektijd;

        return $this;
    }

    public function getBestemming(): ?string
    {
        return $this->bestemming;
    }

    public function setBestemming(string $bestemming): self
    {
        $this->bestemming = $bestemming;

        return $this;
    }

    public function getEvenement(): ?string
    {
        return $this->evenement;
    }

    public function setEvenement(?string $evenement): self
    {
        $this->evenement = $evenement;

        return $this;
    }
}
