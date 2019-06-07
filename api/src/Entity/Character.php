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
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 *     )
 * @ORM\Entity
 */
class Character
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
     * @var string he name of the character.
     *
     * @ORM\Column(type="string", length=32, unique=true, nullable=true)
     */
    public $name;

    /**
     * @var string A short bio or description of the character.
     *
     * @ORM\Column(type="string")
     */
    public $description;

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
     * @var array The canonical URL identifier for this resource.
     * @ORM\Column(type="string", nullable=true)
     */
    public $resourceURI;

    /**
     * @var string A resource list containing comics which feature this character.
     * @ORM\ManyToMany(targetEntity="Comic", inversedBy="characters")
     * @ORM\JoinTable(name="characters_comics")
     * @ORM\JoinColumn(name="comic_id", referencedColumnName="id", nullable=true)
     */
    public $comics;

    public function __construct()
    {
        $this->comics  = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->updated;
    }

    public function setUpdated(\DateTimeInterface $updated): self
    {
        $this->updated = $updated;

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

    public function getResourceURI(): ?string
    {
        return $this->resourceURI;
    }

    public function setResourceURI(?string $resourceURI): self
    {
        $this->resourceURI = $resourceURI;

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
        }

        return $this;
    }

    public function removeComic(Comic $comic): self
    {
        if ($this->comics->contains($comic)) {
            $this->comics->removeElement($comic);
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