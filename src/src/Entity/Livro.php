<?php
namespace App\Entity;

use App\Repository\LivroRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LivroRepository::class)
 * @ORM\Table(name="livro")
 */
class Livro
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private int $id;

    /** @ORM\Column(type="string", nullable=false) */
    private string $nome;
    /** @ORM\Column(type="integer", nullable=false) */
    private int $qtdPaginas;
    /** @ORM\Column(type="decimal", scale=2, nullable=false) */
    private float $valor;

    /**
     * Livro constructor.
     * @param string $nome
     * @param int $qtdPaginas
     * @param float $valor
     */
    public function __construct(string $nome, int $qtdPaginas, float $valor)
    {
        $this->nome = $nome;
        $this->qtdPaginas = $qtdPaginas;
        $this->valor = $valor;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }



    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return int
     */
    public function getQtdPaginas(): int
    {
        return $this->qtdPaginas;
    }

    /**
     * @param int $qtdPaginas
     */
    public function setQtdPaginas(int $qtdPaginas): void
    {
        $this->qtdPaginas = $qtdPaginas;
    }

    /**
     * @return float
     */
    public function getValor(): float
    {
        return $this->valor;
    }

    /**
     * @param float $valor
     */
    public function setValor(float $valor): void
    {
        $this->valor = $valor;
    }


}