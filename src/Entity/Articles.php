<?php

namespace App\Entity; 

use Doctrine\ORM\Mapping as ORM;

/**
 * Articles
 *
 * @ORM\Table(name="articles", indexes={@ORM\Index(name="fk_articles_users_idx", columns={"users_idusers"})})
 * @ORM\Entity
 */
class Articles
{
    /**
     * @var int
     *
     * @ORM\Column(name="idarticles", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idarticles;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=120, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="temps", type="datetime", nullable=true)
     */
    private $temps;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_idusers", referencedColumnName="idusers")
     * })
     */
    private $usersusers;

    public function getIdarticles(): ?int
    {
        return $this->idarticles;
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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getTemps(): ?\DateTimeInterface
    {
        return $this->temps;
    }

    public function setTemps(?\DateTimeInterface $temps): self
    {
        $this->temps = $temps;

        return $this;
    }

    public function getUsersusers(): ?Users
    {
        return $this->usersusers;
    }

    public function setUsersusers(?Users $usersusers): self
    {
        $this->usersusers = $usersusers;

        return $this;
    }


}
