<?php


namespace App\Entity;


class Livro
{
    private string $nome;
    private int $qtdPaginas;
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