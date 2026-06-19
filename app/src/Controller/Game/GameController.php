<?php

namespace App\Controller\Game;

use App\Entity\Character;
use App\Entity\CharacterStats;
use App\Repository\ActionRepository;
use App\Service\Game\GameEngineService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    #[Route('/game/start', name: 'game_start')]
    public function start(
        EntityManagerInterface $entityManager
    ): Response {
        $character = new Character();
        $character->setName('Бомж');
        $character->setOrigin('homeless');
        $character->setStatus('active');
        $character->setDay(1);

        $stats = new CharacterStats();
        $stats->setCharacter($character);

        $character->setStats($stats);

        $entityManager->persist($character);
        $entityManager->persist($stats);
        $entityManager->flush();

        return $this->redirectToRoute('game_view', [
            'id' => $character->getId()
        ]);
    }

    #[Route('/game/{id}', name: 'game_view')]
    public function view(
        Character $character,
        ActionRepository $actionRepository
    ): Response {
        $actions = [];

        if ($character->getCurrentLocation()) {
            $actions = $actionRepository->findBy([
                'location' => $character->getCurrentLocation()
            ]);
        }

        return $this->render('game/index.html.twig', [
            'character' => $character,
            'actions' => $actions
        ]);
    }

    #[Route('/game/{id}/next-day', name: 'game_next_day')]
    public function nextDay(
        Character $character,
        GameEngineService $engine
    ): Response {
        $engine->nextDay($character);

        return $this->redirectToRoute('game_view', [
            'id' => $character->getId()
        ]);
    }
}
