<?php


namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * This is a dummy entity. Remove it!
 *
 * @ApiResource(
 *     collectionOperations={"get"},
 *     itemOperations={"get"}
 *     )
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Comic
{
    /**
     * @var int The unique ID of the comic resource.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The canonical title of the comic.
     *
     * @ORM\Column(type="string", length=255)
     */
    public $title;

    /**
     * @var string The preferred description of the comic.
     *
     * @ORM\Column(type="text")
     */
    public $description;

    /**
     * @var string The publication format of the comic e.g. comic, hardcover, trade paperback.
     * @ORM\Column(type="string" ,length=100, nullable=true)
     */
    public $format;

    /**
     * @var int	The number of story pages in the comic.
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    public $pageCount;

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
     * @var string A resource list containing the creators associated with this comic.
     * @ORM\ManyToOne(targetEntity="Creator", inversedBy="comics", cascade={"persist"})
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=true)
     */
    public $creators;


    /**
     * @var string A resource list containing the creators associated with this comic.
     * @ORM\ManyToMany(targetEntity="Character", mappedBy="comics")
     * @ORM\JoinColumn(name="character_id", referencedColumnName="id", nullable=true)
     */
    public $characters;

    public function __construct()
    {
        $this->characters = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getPageCount(): ?int
    {
        return $this->pageCount;
    }

    public function setPageCount(int $pageCount): self
    {
        $this->pageCount = $pageCount;

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

    public function getCreators(): ?Creator
    {
        return $this->creators;
    }

    public function setCreators(?Creator $creators): self
    {
        $this->creators = $creators;

        return $this;
    }

    /**
     * @return Collection|Character[]
     */
    public function getCharacters(): Collection
    {
        return $this->characters;
    }

    public function addCharacter(Character $character): self
    {
        if (!$this->characters->contains($character)) {
            $this->characters[] = $character;
            $character->addComic($this);
        }

        return $this;
    }

    public function removeCharacter(Character $character): self
    {
        if ($this->characters->contains($character)) {
            $this->characters->removeElement($character);
            $character->removeComic($this);
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