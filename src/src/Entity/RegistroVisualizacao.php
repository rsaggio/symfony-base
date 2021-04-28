<?php

namespace App\Entity;

use App\Repository\RegistroVisualizacaoRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegistroVisualizacaoRepository::class)
 */
class RegistroVisualizacao
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $hora;

    /**
     * @ORM\ManyToOne(targetEntity=Aluno::class, inversedBy="registroVisualizacoes")
     */
    private $aluno;

    public function __construct() {
        $this->hora = new DateTime();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHora(): ?\DateTimeInterface
    {
        return $this->hora;
    }

    public function setHora(\DateTimeInterface $hora): self
    {
        $this->hora = $hora;

        return $this;
    }

    public function getAluno(): ?Aluno
    {
        return $this->aluno;
    }

    public function setAluno(?Aluno $aluno): self
    {
        $this->aluno = $aluno;

        return $this;
    }

    public function __toString(): string
    {
        return "Visualizado as: ". $this->hora->format("d/m/Y H:i:s");
    }
}
