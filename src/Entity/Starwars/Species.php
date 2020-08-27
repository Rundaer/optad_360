<?php

namespace App\Entity\Starwars;

use App\Repository\Starwars\SpeciesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SpeciesRepository::class)
 */
class Species
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classification;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $average_height;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $average_lifespan;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eye_colors;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hair_colors;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $skin_colors;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $language;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @ORM\Column(type="datetime")
     */
    private $edited;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\ManyToMany(targetEntity=Film::class, mappedBy="species")
     */
    private $films;

    /**
     * @ORM\ManyToMany(targetEntity=Character::class, mappedBy="species")
     */
    private $people;

    /**
     * @ORM\ManyToOne(targetEntity=Planet::class)
     */
    private $homeworld;

    public function __construct()
    {
        $this->films = new ArrayCollection();
        $this->people = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getClassification(): ?string
    {
        return $this->classification;
    }

    public function setClassification(string $classification): self
    {
        $this->classification = $classification;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getAverageHeight(): ?string
    {
        return $this->average_height;
    }

    public function setAverageHeight(string $average_height): self
    {
        $this->average_height = $average_height;

        return $this;
    }

    public function getAverageLifespan(): ?string
    {
        return $this->average_lifespan;
    }

    public function setAverageLifespan(string $average_lifespan): self
    {
        $this->average_lifespan = $average_lifespan;

        return $this;
    }

    public function getEyeColors(): ?string
    {
        return $this->eye_colors;
    }

    public function setEyeColors(string $eye_colors): self
    {
        $this->eye_colors = $eye_colors;

        return $this;
    }

    public function getHairColors(): ?string
    {
        return $this->hair_colors;
    }

    public function setHairColors(string $hair_colors): self
    {
        $this->hair_colors = $hair_colors;

        return $this;
    }

    public function getSkinColors(): ?string
    {
        return $this->skin_colors;
    }

    public function setSkinColors(string $skin_colors): self
    {
        $this->skin_colors = $skin_colors;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    public function getEdited(): ?\DateTimeInterface
    {
        return $this->edited;
    }

    public function setEdited(\DateTimeInterface $edited): self
    {
        $this->edited = $edited;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return Collection|Film[]
     */
    public function getFilms(): Collection
    {
        return $this->films;
    }

    public function addFilm(Film $film): self
    {
        if (!$this->films->contains($film)) {
            $this->films[] = $film;
            $film->addSpecies($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): self
    {
        if ($this->films->contains($film)) {
            $this->films->removeElement($film);
            $film->removeSpecies($this);
        }

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getPeople(): Collection
    {
        return $this->people;
    }

    public function addPerson(Character $person): self
    {
        if (!$this->people->contains($person)) {
            $this->people[] = $person;
            $person->addSpecies($this);
        }

        return $this;
    }

    public function removePerson(Character $person): self
    {
        if ($this->people->contains($person)) {
            $this->people->removeElement($person);
            $person->removeSpecies($this);
        }

        return $this;
    }

    public function getHomeworld(): ?Planet
    {
        return $this->homeworld;
    }

    public function setHomeworld(?Planet $homeworld): self
    {
        $this->homeworld = $homeworld;

        return $this;
    }
}
