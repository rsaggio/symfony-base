<?php

namespace App\Controller;

use App\Entity\Aluno;
use App\Entity\RegistroVisualizacao;
use App\Form\AlunoType;
use App\Repository\AlunoRepository;
use App\Service\LoggerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/aluno')]
class AlunoController extends AbstractController
{
    #[Route('/', name: 'aluno_index', methods: ['GET'])]
    public function index(AlunoRepository $alunoRepository): Response
    {
        return $this->render('aluno/index.html.twig', [
            'alunos' => $alunoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'aluno_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $aluno = new Aluno();
        $form = $this->createForm(AlunoType::class, $aluno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($aluno);
            $entityManager->flush();

            return $this->redirectToRoute('aluno_index');
        }

        return $this->render('aluno/new.html.twig', [
            'aluno' => $aluno,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'aluno_show', methods: ['GET'])]
    public function show(Aluno $aluno, LoggerService $loggerService): Response
    {
        $loggerService->logaVisualizacao($aluno);
        return $this->render('aluno/show.html.twig', [
            'aluno' => $aluno,
        ]);
    }

    #[Route('/{id}/edit', name: 'aluno_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Aluno $aluno): Response
    {
        $form = $this->createForm(AlunoType::class, $aluno);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aluno_index');
        }

        return $this->render('aluno/edit.html.twig', [
            'aluno' => $aluno,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'aluno_delete', methods: ['POST'])]
    public function delete(Request $request, Aluno $aluno): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aluno->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($aluno);
            $entityManager->flush();
        }

        return $this->redirectToRoute('aluno_index');
    }
}
