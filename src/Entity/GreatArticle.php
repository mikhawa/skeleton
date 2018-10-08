<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GreatArticleRepository")
 */
class GreatArticle
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $texte;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $thedate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getTexte(): ?string
    {
        return $this->texte;
    }

    public function setTexte(string $texte): self
    {
        $this->texte = $texte;

        return $this;
    }

    public function getThedate(): ?\DateTimeInterface
    {
        return $this->thedate;
    }

    public function setThedate(?\DateTimeInterface $thedate): self
    {
        $this->thedate = $thedate;

        return $this;
    }
}
