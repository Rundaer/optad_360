<?php

namespace App\Entity\Starwars;

use App\Repository\Starwars\CharacterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharacterRepository::class)
 * @ORM\Table(name="`character`")
 */
class Character
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
    private $birth_year;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eye_color;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gender;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hair_color;

    /**
     * @ORM\Column(type="integer")
     */
    private $height;

    /**
     * @ORM\Column(type="integer")
     */
    private $mass;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $skin_color;

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
     * @ORM\ManyToMany(targetEntity=Film::class, mappedBy="characters")
     */
    private $films;

    /**
     * @ORM\ManyToOne(targetEntity=Planet::class, inversedBy="characters")
     */
    private $homeworld;

    /**
     * @ORM\ManyToMany(targetEntity=Species::class, inversedBy="people")
     */
    private $species;

    /**
     * @ORM\ManyToMany(targetEntity=Starship::class, mappedBy="pilots")
     */
    private $starships;

    public function __construct()
    {
        $this->films = new ArrayCollection();
        $this->species = new ArrayCollection();
        $this->starships = new ArrayCollection();
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

    public function getBirthYear(): ?string
    {
        return $this->birth_year;
    }

    public function setBirthYear(string $birth_year): self
    {
        $this->birth_year = $birth_year;

        return $this;
    }

    public function getEyeColor(): ?string
    {
        return $this->eye_color;
    }

    public function setEyeColor(string $eye_color): self
    {
        $this->eye_color = $eye_color;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getHairColor(): ?string
    {
        return $this->hair_color;
    }

    public function setHairColor(string $hair_color): self
    {
        $this->hair_color = $hair_color;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getMass(): ?int
    {
        return $this->mass;
    }

    public function setMass(int $mass): self
    {
        $this->mass = $mass;

        return $this;
    }

    public function getSkinColor(): ?string
    {
        return $this->skin_color;
    }

    public function setSkinColor(string $skin_color): self
    {
        $this->skin_color = $skin_color;

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
            $film->addCharacter($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): self
    {
        if ($this->films->contains($film)) {
            $this->films->removeElement($film);
            $film->removeCharacter($this);
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

    /**
     * @return Collection|Species[]
     */
    public function getSpecies(): Collection
    {
        return $this->species;
    }

    public function addSpecies(Species $species): self
    {
        if (!$this->species->contains($species)) {
            $this->species[] = $species;
        }

        return $this;
    }

    public function removeSpecies(Species $species): self
    {
        if ($this->species->contains($species)) {
            $this->species->removeElement($species);
        }

        return $this;
    }

    /**
     * @return Collection|Starship[]
     */
    public function getStarships(): Collection
    {
        return $this->starships;
    }

    public function addStarship(Starship $starship): self
    {
        if (!$this->starships->contains($starship)) {
            $this->starships[] = $starship;
            $starship->addPilot($this);
        }

        return $this;
    }

    public function removeStarship(Starship $starship): self
    {
        if ($this->starships->contains($starship)) {
            $this->starships->removeElement($starship);
            $starship->removePilot($this);
        }

        return $this;
    }
}
