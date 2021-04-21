<?php

namespace App\Controller;

use App\Entity\Livro;
use App\Repository\LivroRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


// FormType

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(LivroRepository $livroRepository): Response
    {
        $livros = $livroRepository->findAll();

        return $this->render('home/index.html.twig', [
            "livros" => $livros
        ]);
    }

    /**
     * @Route("/adicionar", name="adicionar")
     */
    public function adicionar(Request $request, LivroRepository $livroRepository) {
        $nome = $request->get('nome');
        $qtdPaginas = $request->get('qtdPaginas');
        $valor = $request->get('valor');

        $livro = new Livro($nome, $qtdPaginas, $valor);
        $livroRepository->save($livro);

        $this->addFlash("message", "Livro foi cadastrado com sucesso");

        return $this->redirectToRoute("home");
    }

    /**
     * @Route("/editar/{id}", name="editar")
     */
    public function editar(Livro $livro): Response
    {
        return $this->render('home/form.html.twig', [
            "livro" => $livro
        ]);
    }

    /**
     * @Route("/editar/save/{id}", name="editar_save")
     */
    public function salvarEdicao(Request $request, Livro $livro, LivroRepository $livroRepository): Response
    {
        $nome = $request->get('nome');
        $qtdPaginas = $request->get('qtdPaginas');
        $valor = $request->get('valor');

        $livro->setNome($nome);
        $livro->setQtdPaginas($qtdPaginas);
        $livro->setValor($valor);

        $livroRepository->save($livro);

        $this->addFlash("message", "Livro foi editado com sucesso");

        return $this->redirectToRoute("home");

    }

    /**
     * @Route("/remove/{id}", name="remover")
     */
    public function remover(Livro $livro, LivroRepository $livroRepository): Response
    {
        $livroRepository->remove($livro);
        $this->addFlash("message", "Livro removido com sucesso");

        return $this->redirectToRoute("home");


    }

}
