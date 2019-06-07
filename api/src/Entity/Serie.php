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
 * )
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Serie
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
     * @var string    The canonical title of the series.
     *
     * @ORM\Column(type="string")
     */
    public $title;

    /**
     * @var string A description of the series.
     *
     * @ORM\Column(type="string")
     */
    public $description;

    /**
     * @var int    The first year of publication for the series.
     *
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    public $startYear;

    /**
     * @var int    The last year of publication for the series (conventionally, 2099 for ongoing series).
     *
     * @ORM\Column(type="integer", options={"unsigned"=true})
     */
    public $endYear;

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
     * @var string A resource list containing comics which feature this character.
     * @ORM\ManyToOne(targetEntity="Comic"))
     * @ORM\JoinColumn(name="comic_id", referencedColumnName="id", nullable=true)
     */
    public $comics;

    /**
     * @var string A resource list containing the creators associated with this comic.
     * @ORM\ManyToOne(targetEntity="Creator", inversedBy="series"))
     * @ORM\JoinColumn(name="creator_id", referencedColumnName="id", nullable=true)
     */
    public $creators;

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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getStartYear(): ?int
    {
        return $this->startYear;
    }

    public function setStartYear(int $startYear): self
    {
        $this->startYear = $startYear;

        return $this;
    }

    public function getEndYear(): ?int
    {
        return $this->endYear;
    }

    public function setEndYear(int $endYear): self
    {
        $this->endYear = $endYear;

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

    public function getComics(): ?Comic
    {
        return $this->comics;
    }

    public function setComics(?Comic $comics): self
    {
        $this->comics = $comics;

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