<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FilmRepository::class)
 */
class Film
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $title;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $premiereAt;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $synopsis;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rating;

    /**
     * @ORM\Column(type="integer")
     */
    private $playingTime;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isReleased;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $actors = [];

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $director;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $tags = [];

    /**
     * @ORM\OneToMany(targetEntity=Review::class, mappedBy="film")
     */
    private $reviews;

    /**
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $poster;

    public function ratingCalculate(){
        if(count($this->getReviews()) === 0){
            $this->rating = 0;
        }
        else{
            $reviewCounter = 0;
            $rating = 0;
            foreach ($this->getReviews() as $review){
                $reviewCounter ++;
                $rating += $review->getRating();
            }
            $this->rating = $rating / $reviewCounter;
        }

        return $this->rating;
    }

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->title;
        // TODO: Implement __toString() method.
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPremiereAt(): ?\DateTimeImmutable
    {
        return $this->premiereAt;
    }

    public function setPremiereAt(?\DateTimeImmutable $premiereAt): self
    {
        $this->premiereAt = $premiereAt;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(?string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getRating(): ?float
    {
        return $this->rating;
    }


    public function setPlayingTime(int $playingTime): self
    {
        $this->playingTime = $playingTime;

        return $this;
    }

    public function getPlayingTime()
    {
        return $this->playingTime;
    }

    public function getIsReleased(): ?bool
    {
        return $this->isReleased;
    }

    public function setIsReleased(bool $isReleased): self
    {
        $this->isReleased = $isReleased;

        return $this;
    }

    public function getActors(): ?array
    {
        return $this->actors;
    }

    public function setActors(?array $actors): self
    {
        $this->actors = $actors;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(?string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(?array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return Collection|Review[]
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Review $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setFilm($this);
        }

        return $this;
    }

    public function removeReview(Review $review): self
    {
        if ($this->reviews->removeElement($review)) {
            // set the owning side to null (unless already changed)
            if ($review->getFilm() === $this) {
                $review->setFilm(null);
            }
        }

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(?string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

}
