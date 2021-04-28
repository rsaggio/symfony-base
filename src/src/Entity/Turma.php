<?php

namespace App\Entity;

use App\Repository\TurmaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TurmaRepository::class)
 */
class Turma
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
    private $diaDaSemana;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $horario;

    /**
     * @ORM\ManyToMany(targetEntity=Aluno::class, inversedBy="turmas")
     */
    private $alunos;

    public function __construct()
    {
        $this->alunos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiaDaSemana(): ?string
    {
        return $this->diaDaSemana;
    }

    public function setDiaDaSemana(string $diaDaSemana): self
    {
        $this->diaDaSemana = $diaDaSemana;

        return $this;
    }

    public function getHorario(): ?string
    {
        return $this->horario;
    }

    public function setHorario(string $horario): self
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * @return Collection|Aluno[]
     */
    public function getAlunos(): Collection
    {
        return $this->alunos;
    }

    public function addAluno(Aluno $aluno): self
    {
        if (!$this->alunos->contains($aluno)) {
            $this->alunos[] = $aluno;
        }

        return $this;
    }

    public function removeAluno(Aluno $aluno): self
    {
        $this->alunos->removeElement($aluno);

        return $this;
    }

    function __toString() {
        return $this->diaDaSemana." - ".$this->horario;
    }
}
