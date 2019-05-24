<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * This is a dummy entity. Remove it!
 *
 * @ORM\HasLifecycleCallbacks
 * @ApiResource(
 * )
 * @ORM\Entity
 */
class Creator
{
    /**
     * @var int The unique ID of the character resource.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string    The first name of the creator.
     *
     * @ORM\Column(type="string", length=75)
     */
    public $firstName;

    /**
     * @var string    The last name of the creator
     *
     * @ORM\Column(type="string", length=75)
     */
    public $lastName;

    /**
     * @var array    The full name of the creator (a space-separated concatenation of the above four fields).
     * @ORM\Column(type="string")
     */

    public $fullName;

    /**
     * @var string The canonical URL identifier for this resource.
     * @ORM\Column(type="string", nullable=true, length=300)
     *
     */
    public $resourceURI;

    /**
     *
     * @var string The date the resource was most recently modified.
     *
     * @ORM\Column(type="datetime")
     *
     */
    public $created;

    /**
     *
     * @var string The date the resource was most recently modified.
     *
     * @ORM\Column(type="datetime")
     *
     */
    public $updated;

    /**
     * @var string A resource list containing the series which feature work by this creator.
     * @ORM\OneToMany(targetEntity="Comic",mappedBy="creators")
     * @ORM\JoinColumn(name="comic_id", referencedColumnName="id", nullable=true)
     */
    public $comics;


    /**
     * @var string A resource list containing the series which feature work by this creator.
     * @ORM\OneToMany(targetEntity="Serie",mappedBy="creators")
     * @ORM\JoinColumn(name="serie_id", referencedColumnName="id", nullable=true)
     */
    public $series;

    public function __construct()
    {
        $this->comics = new ArrayCollection();
        $this->series = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getResourceURI(): ?string
    {
        return $this->resourceURI;
    }

    public function setResourceURI(?string $resourceURI): self
    {
        $this->resourceURI = $resourceURI;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return Collection|Comic[]
     */
    public function getComics(): Collection
    {
        return $this->comics;
    }

    public function addComic(Comic $comic): self
    {
        if (!$this->comics->contains($comic)) {
            $this->comics[] = $comic;
            $comic->setCreators($this);
        }

        return $this;
    }

    public function removeComic(Comic $comic): self
    {
        if ($this->comics->contains($comic)) {
            $this->comics->removeElement($comic);
            // set the owning side to null (unless already changed)
            if ($comic->getCreators() === $this) {
                $comic->setCreators(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Serie[]
     */
    public function getSeries(): Collection
    {
        return $this->series;
    }

    public function addSeries(Serie $series): self
    {
        if (!$this->series->contains($series)) {
            $this->series[] = $series;
            $series->setCreators($this);
        }

        return $this;
    }

    public function removeSeries(Serie $series): self
    {
        if ($this->series->contains($series)) {
            $this->series->removeElement($series);
            // set the owning side to null (unless already changed)
            if ($series->getCreators() === $this) {
                $series->setCreators(null);
            }
        }

        return $this;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function updateModifiedDatetime()
    {
        if (!$this->getCreated() instanceOf \DateTime) {
            $this->setCreated(new \DateTime());
        }
        $this->setUpdated(new \DateTime());
    }


}
