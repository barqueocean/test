<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        ArticleRepository $articleRepository
    ): Response {
        return $this->render('home/index.html.twig', [
            'latestArticles' => $articleRepository->findLatest(4),
            'newsArticles' => $articleRepository->findLatest(10),
            'hotArticles' => $articleRepository->findLatest(6),
        ]);
    }
}
