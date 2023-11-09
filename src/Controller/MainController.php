<?php

namespace App\Controller;

use App\Repository\ArticlesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index( ArticlesRepository $articlesRepository): Response
    {

      
        return $this->render('main/index.html.twig', [
            'articles' => $articlesRepository->findAll(),
        ]);
    }
    #[Route('/auth', name: 'auth')]
    public function auth( ): Response
    {

      $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('main/index.html.twig', [
            'articles' => '',
        ]);
    }
    // #[Route('/login', name: 'login')]
    // public function login( ): Response
    // {

     
    //     return $this->render('main/index.html.twig', [
    //         'articles' => '',
    //     ]);
    // }
}
