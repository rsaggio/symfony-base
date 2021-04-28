<?php

namespace App\Entity;

use App\Repository\AlunoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=AlunoRepository::class)
 */
class Aluno
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
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * One Customer has One Cart.
     * @ORM\OneToOne(targetEntity="Endereco", mappedBy="aluno", cascade={"ALL"})
     */
    private Endereco $endereco;

    /**
     * @ORM\Column(type="date")
     */
    private $dataNascimento;

    /**
     * @ORM\ManyToOne(targetEntity=Unidade::class, inversedBy="alunos")
     */
    private $unidade;

    /**
     * @ORM\ManyToMany(targetEntity=Turma::class, mappedBy="alunos")
     */
    private $turmas;

    /**
     * @ORM\OneToMany(targetEntity=RegistroVisualizacao::class, mappedBy="aluno", cascade={"persist"})
     */
    private $registroVisualizacoes;

    public function __construct()
    {
        $this->turmas = new ArrayCollection();
        $this->registroVisualizacoes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDataNascimento(): ?\DateTimeInterface
    {
        return $this->dataNascimento;
    }

    /**
     * @return Endereco
     */
    public function getEndereco(): Endereco
    {
        return $this->endereco;
    }

    /**
     * @param Endereco $endereco
     */
    public function setEndereco(Endereco $endereco): void
    {
        $this->endereco = $endereco;
        $endereco->setAluno($this);
    }



    public function setDataNascimento(\DateTimeInterface $dataNascimento): self
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    public function getUnidade(): ?Unidade
    {
        return $this->unidade;
    }

    public function setUnidade(?Unidade $unidade): self
    {
        $this->unidade = $unidade;

        return $this;
    }

    /**
     * @return Collection|Turma[]
     */
    public function getTurmas(): Collection
    {
        return $this->turmas;
    }

    public function addTurma(Turma $turma): self
    {
        if (!$this->turmas->contains($turma)) {
            $this->turmas[] = $turma;
            $turma->addAluno($this);
        }

        return $this;
    }

    public function removeTurma(Turma $turma): self
    {
        if ($this->turmas->removeElement($turma)) {
            $turma->removeAluno($this);
        }

        return $this;
    }

    function __toString() {
        return $this->nome;
    }

    /**
     * @return Collection|RegistroVisualizacao[]
     */
    public function getRegistroVisualizacoes(): Collection
    {
        return $this->registroVisualizacoes;
    }

    public function addRegistroVisualizacao(RegistroVisualizacao $registroVisualizacao): self
    {
        if (!$this->registroVisualizacoes->contains($registroVisualizacao)) {
            $this->registroVisualizacoes[] = $registroVisualizacao;
            $registroVisualizacao->setAluno($this);
        }

        return $this;
    }

    public function removeRegistroVisualizacao(RegistroVisualizacao $registroVisualizacao): self
    {
        if ($this->registroVisualizacoes->removeElement($registroVisualizacao)) {
            // set the owning side to null (unless already changed)
            if ($registroVisualizacao->getAluno() === $this) {
                $registroVisualizacao->setAluno(null);
            }
        }

        return $this;
    }
}
