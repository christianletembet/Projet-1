<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LivreurRepository")
 */
class Livreur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $NombreLivraisons;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $TempsLivraison;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Absences;

    /**
     * @ORM\Column(type="integer")
     */
    private $EtatCommande;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getNombreLivraisons(): ?int
    {
        return $this->NombreLivraisons;
    }

    public function setNombreLivraisons(int $NombreLivraisons): self
    {
        $this->NombreLivraisons = $NombreLivraisons;

        return $this;
    }

    public function getTempsLivraison(): ?string
    {
        return $this->TempsLivraison;
    }

    public function setTempsLivraison(string $TempsLivraison): self
    {
        $this->TempsLivraison = $TempsLivraison;

        return $this;
    }

    public function getAbsences(): ?int
    {
        return $this->Absences;
    }

    public function setAbsences(?int $Absences): self
    {
        $this->Absences = $Absences;

        return $this;
    }

    public function getEtatCommande(): ?int
    {
        return $this->EtatCommande;
    }

    public function setEtatCommande(int $EtatCommande): self
    {
        $this->EtatCommande = $EtatCommande;

        return $this;
    }
}
