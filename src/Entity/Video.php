<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Video
 *
 * @ORM\Table(name="video", indexes={@ORM\Index(name="fk_video_user1_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Video
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="embed_code", type="text", length=65535, nullable=false)
     */
    private $embedCode;

    /**
     * @var string
     *
     * @ORM\Column(name="plateform", type="string", length=255, nullable=false)
     */
    private $plateform;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createdAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updatedAt = 'CURRENT_TIMESTAMP';

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Trick", mappedBy="video")
     */
    private $trick = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->trick = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmbedCode(): ?string
    {
        return $this->embedCode;
    }

    public function setEmbedCode(string $embedCode): self
    {
        $this->embedCode = $embedCode;

        return $this;
    }

    public function getPlateform(): ?string
    {
        return $this->plateform;
    }

    public function setPlateform(string $plateform): self
    {
        $this->plateform = $plateform;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, Trick>
     */
    public function getTrick(): Collection
    {
        return $this->trick;
    }

    public function addTrick(Trick $trick): self
    {
        if (!$this->trick->contains($trick)) {
            $this->trick->add($trick);
            $trick->addVideo($this);
        }

        return $this;
    }

    public function removeTrick(Trick $trick): self
    {
        if ($this->trick->removeElement($trick)) {
            $trick->removeVideo($this);
        }

        return $this;
    }

}
