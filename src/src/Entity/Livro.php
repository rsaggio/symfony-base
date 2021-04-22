<?php
namespace App\Entity;

use App\Repository\LivroRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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

    /**
     *  @ORM\Column(type="string", nullable=false)
     *  @Assert\NotBlank
     */
    private string $nome;
    /**
     * @ORM\Column(type="integer", nullable=false)
     * @Assert\NotBlank
     * @Assert\Range(
     *      min = 0,
     *      max = 1000,
     *      notInRangeMessage = "A quantidade de páginas deve estar entre {{ min }} e {{ max }}.",
     * )
     */
    private int $qtdPaginas;
    /**
     * @ORM\Column(type="decimal", scale=2, nullable=false)
     * @Assert\NotBlank
     */
    private float $valor;

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