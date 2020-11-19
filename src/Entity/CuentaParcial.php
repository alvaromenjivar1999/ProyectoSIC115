<?php

namespace App\Entity;

use App\Repository\CuentaParcialRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CuentaParcialRepository::class)
 */
class CuentaParcial
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="float")
     */
    private $debe;
    /**
     * @ORM\Column(type="float")
     */
    private $haber;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Partida", inversedBy="cuentasParciales")
     */
    private $partidas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDebe(): ?float
    {
        return $this->debe;
    }

    public function setDebe(float $debe): self
    {
        $this->debe = $debe;

        return $this;
    }

    public function getHaber(): ?float
    {
        return $this->haber;
    }

    public function setHaber(float $haber): self
    {
        $this->haber = $haber;

        return $this;
    }
}
