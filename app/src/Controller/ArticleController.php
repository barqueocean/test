<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ArticleController extends AbstractController
{
    #[Route('/article/{slug}', name: 'app_article_show')]
    public function show(
        string $slug,
        ArticleRepository $articleRepository
    ): Response {

        $article = $articleRepository->findOneBySlug($slug);

        if (!$article) {
            throw $this->createNotFoundException();
        }

        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
