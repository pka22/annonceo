<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnonceRepository")
 */
class Annonce
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description_courte;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_longue;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $pays;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $cp;

    /**
     * @ORM\Column(type="integer")
     */
    private $membre_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $photo_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $category_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_enregistrement;


   /* /**
     * @param mixed $records
     */
    /*private $records*/
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescriptionCourte(): ?string
    {
        return $this->description_courte;
    }

    public function setDescriptionCourte(?string $description_courte): self
    {
        $this->description_courte = $description_courte;

        return $this;
    }

    public function getDescriptionLongue(): ?string
    {
        return $this->description_longue;
    }

    public function setDescriptionLongue(?string $description_longue): self
    {
        $this->description_longue = $description_longue;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(?int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getMembreId(): ?int
    {
        return $this->membre_id;
    }

    public function setMembreId(int $membre_id): self
    {
        $this->membre_id = $membre_id;

        return $this;
    }

    public function getPhotoId(): ?int
    {
        return $this->photo_id;
    }

    public function setPhotoId(int $photo_id): self
    {
        $this->photo_id = $photo_id;

        return $this;
    }

    public function getCategoryId(): ?int
    {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id): self
    {
        $this->category_id = $category_id;

        return $this;
    }

    public function getDateEnregistrement(): ?\DateTimeInterface
    {

        return $this->date_enregistrement;
    }

    public function setDateEnregistrement(\DateTimeInterface $date_enregistrement): self
    {


        $this->date_enregistrement = $date_enregistrement;
        // date("Y-m-d H:i:s");

        return $this;
    }
  /*  public function __construct()
    {
        $this->records = new ArrayCollection();
    }

    public function getRecords(): Collection
    {
        return $this->records;

    }*/
    //public function setRecords($records): void
  //  {
       // $this->records = $records;
   // }

}
