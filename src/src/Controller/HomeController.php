<?php

namespace App\Controller;

use App\Entity\Livro;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $cleanCode = new Livro("Clean Code", 200, 130.40);
        $ddd = new Livro("Domain Driven Design", 700, 530.40);
        $livros = [$cleanCode, $ddd];

        return $this->render('home/index.html.twig', [
            "livros" => $livros
        ]);
    }
}
