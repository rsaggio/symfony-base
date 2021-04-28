<?php

namespace App\Controller;

use App\Entity\Turma;
use App\Form\TurmaType;
use App\Repository\TurmaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/turma')]
class TurmaController extends AbstractController
{
    #[Route('/', name: 'turma_index', methods: ['GET'])]
    public function index(TurmaRepository $turmaRepository): Response
    {
        return $this->render('turma/index.html.twig', [
            'turmas' => $turmaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'turma_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $turma = new Turma();
        $form = $this->createForm(TurmaType::class, $turma);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($turma);
            $entityManager->flush();

            return $this->redirectToRoute('turma_index');
        }

        return $this->render('turma/new.html.twig', [
            'turma' => $turma,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'turma_show', methods: ['GET'])]
    public function show(Turma $turma): Response
    {
        return $this->render('turma/show.html.twig', [
            'turma' => $turma,
        ]);
    }

    #[Route('/{id}/edit', name: 'turma_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Turma $turma): Response
    {
        $form = $this->createForm(TurmaType::class, $turma);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('turma_index');
        }

        return $this->render('turma/edit.html.twig', [
            'turma' => $turma,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'turma_delete', methods: ['POST'])]
    public function delete(Request $request, Turma $turma): Response
    {
        if ($this->isCsrfTokenValid('delete'.$turma->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($turma);
            $entityManager->flush();
        }

        return $this->redirectToRoute('turma_index');
    }
}
