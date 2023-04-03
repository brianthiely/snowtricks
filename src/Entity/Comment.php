<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: CommentRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500)]
    #[Assert\Length(min: 10, max: 500, minMessage: 'Le commentaire doit faire au moins 10 caractères', maxMessage: 'Le commentaire doit faire au plus 500 caractères')]
    private ?string $content = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    private ?Trick $trick = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        $now = new \DateTimeImmutable();
        $diff = $this->created_at->diff($now);

        if ($diff->y > 0) {
            return sprintf('il y a %d ans', $diff->y);
        } elseif ($diff->m > 0) {
            return sprintf('il y a %d mois', $diff->m);
        } elseif ($diff->d > 0) {
            return sprintf('il y a %d jours', $diff->d);
        } elseif ($diff->h > 0) {
            return sprintf('il y a %d heures', $diff->h);
        } elseif ($diff->i > 0) {
            return sprintf('il y a %d minutes', $diff->i);
        } else {
            return sprintf('il y a %d secondes', $diff->s);
        }
    }


    #[ORM\PrePersist]
    public function setCreatedAt(): void
    {
        $this->created_at = new DateTimeImmutable();
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

    public function getTrick(): ?Trick
    {
        return $this->trick;
    }

    public function setTrick(?Trick $trick): self
    {
        $this->trick = $trick;

        return $this;
    }

}
