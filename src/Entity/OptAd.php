<?php

namespace App\Entity;

use App\Repository\OptAdRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptAdRepository::class)
 */
class OptAd
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
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tags;

    /**
     * @ORM\Column(type="datetime")
     *
     */
    private $date;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $estimatedRevenue;

    /**
     * @ORM\Column(type="integer")
     */
    private $adImpression;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $cpm;

    /**
     * @ORM\Column(type="integer")
     */
    private $clicks;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $ctr;


    public function getId(): ?int
    {
        return $this->id;
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

    public function getTags(): ?string
    {
        return $this->tags;
    }
    
    public function setTags(string $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getEstimatedRevenue(): ?string
    {
        return $this->estimatedRevenue;
    }

    public function setEstimatedRevenue(string $estimatedRevenue): self
    {
        $this->estimatedRevenue = $estimatedRevenue;

        return $this;
    }

    public function getAdImpression(): ?int
    {
        return $this->adImpression;
    }

    public function setAdImpression(int $adImpression): self
    {
        $this->adImpression = $adImpression;

        return $this;
    }

    public function getCpm(): ?string
    {
        return $this->cpm;
    }

    public function setCpm(string $cpm): self
    {
        $this->cpm = $cpm;

        return $this;
    }

    public function getClicks(): ?int
    {
        return $this->clicks;
    }

    public function setClicks(int $clicks): self
    {
        $this->clicks = $clicks;

        return $this;
    }

    public function getCtr(): ?string
    {
        return $this->ctr;
    }

    public function setCtr(string $ctr): self
    {
        $this->ctr = $ctr;

        return $this;
    }
}
