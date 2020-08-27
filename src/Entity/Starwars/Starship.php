<?php

namespace App\Entity\Starwars;

use App\Repository\Starwars\StarshipRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StarshipRepository::class)
 */
class Starship
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
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $starship_class;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $manufacturer;

    /**
     * @ORM\Column(type="integer")
     */
    private $cost_in_credits;

    /**
     * @ORM\Column(type="integer")
     */
    private $length;

    /**
     * @ORM\Column(type="integer")
     */
    private $crew;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $passengers;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $max_atmosphering_speed;

    /**
     * @ORM\Column(type="float")
     */
    private $hyperdrive_rating;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $MGLT;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cargo_capacity;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $consumables;

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
     * @ORM\ManyToMany(targetEntity=Film::class, mappedBy="starships")
     */
    private $films;

    /**
     * @ORM\ManyToMany(targetEntity=Character::class, inversedBy="starships")
     */
    private $pilots;

    public function __construct()
    {
        $this->films = new ArrayCollection();
        $this->pilots = new ArrayCollection();
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

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getStarshipClass(): ?string
    {
        return $this->starship_class;
    }

    public function setStarshipClass(string $starship_class): self
    {
        $this->starship_class = $starship_class;

        return $this;
    }

    public function getManufacturer(): ?string
    {
        return $this->manufacturer;
    }

    public function setManufacturer(string $manufacturer): self
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }

    public function getCostInCredits(): ?int
    {
        return $this->cost_in_credits;
    }

    public function setCostInCredits(int $cost_in_credits): self
    {
        $this->cost_in_credits = $cost_in_credits;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getCrew(): ?int
    {
        return $this->crew;
    }

    public function setCrew(int $crew): self
    {
        $this->crew = $crew;

        return $this;
    }

    public function getPassengers(): ?string
    {
        return $this->passengers;
    }

    public function setPassengers(string $passengers): self
    {
        $this->passengers = $passengers;

        return $this;
    }

    public function getMaxAtmospheringSpeed(): ?string
    {
        return $this->max_atmosphering_speed;
    }

    public function setMaxAtmospheringSpeed(string $max_atmosphering_speed): self
    {
        $this->max_atmosphering_speed = $max_atmosphering_speed;

        return $this;
    }

    public function getHyperdriveRating(): ?float
    {
        return $this->hyperdrive_rating;
    }

    public function setHyperdriveRating(float $hyperdrive_rating): self
    {
        $this->hyperdrive_rating = $hyperdrive_rating;

        return $this;
    }

    public function getMGLT(): ?string
    {
        return $this->MGLT;
    }

    public function setMGLT(string $MGLT): self
    {
        $this->MGLT = $MGLT;

        return $this;
    }

    public function getCargoCapacity(): ?string
    {
        return $this->cargo_capacity;
    }

    public function setCargoCapacity(string $cargo_capacity): self
    {
        $this->cargo_capacity = $cargo_capacity;

        return $this;
    }

    public function getConsumables(): ?string
    {
        return $this->consumables;
    }

    public function setConsumables(string $consumables): self
    {
        $this->consumables = $consumables;

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
            $film->addStarship($this);
        }

        return $this;
    }

    public function removeFilm(Film $film): self
    {
        if ($this->films->contains($film)) {
            $this->films->removeElement($film);
            $film->removeStarship($this);
        }

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getPilots(): Collection
    {
        return $this->pilots;
    }

    public function addPilot(Character $pilot): self
    {
        if (!$this->pilots->contains($pilot)) {
            $this->pilots[] = $pilot;
        }

        return $this;
    }

    public function removePilot(Character $pilot): self
    {
        if ($this->pilots->contains($pilot)) {
            $this->pilots->removeElement($pilot);
        }

        return $this;
    }
}
