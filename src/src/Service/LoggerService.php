<?php


namespace App\Service;


use App\Entity\Aluno;
use App\Entity\RegistroVisualizacao;
use App\Repository\AlunoRepository;

class LoggerService
{
    /**
     * @var AlunoRepository
     */
    private AlunoRepository $alunoRepository;

    public function __construct(AlunoRepository $alunoRepository) {

        $this->alunoRepository = $alunoRepository;
    }
    public function logaVisualizacao(Aluno $aluno) {
        $aluno->addRegistroVisualizacao(new RegistroVisualizacao());
        $this->alunoRepository->save($aluno);
    }
}