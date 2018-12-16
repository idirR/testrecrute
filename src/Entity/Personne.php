<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonneRepository")
 */
class Personne
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $emai;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmai()
    {
        return $this->emai;
    }

    public function setEmai(string $emai)
    {
        $this->emai = $emai;

        return $this;
    }

    public function getPassword()
    {
        return $this->Password;
    }

    public function setPassword(string $Password)
    {
        $this->Password = $Password;

        return $this;
    }
}
