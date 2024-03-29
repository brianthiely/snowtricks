<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Trick;
use App\Repository\TrickRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(TrickRepository $trickRepository):
    Response
    {
        $tricks = $trickRepository->findLatest();
        $totalTricksCount = $trickRepository->count([]);

        return $this->render('homepage/index.html.twig', compact('tricks', 'totalTricksCount' ));
    }

    #[Route('/homepage/load-more/{displayedTricksCount}', name: 'homepage_load_more')]
    public function loadMore(int $displayedTricksCount, TrickRepository $trickRepository): Response
    {
        $offset = $displayedTricksCount;

        $tricks = $trickRepository->findLatest(15, $offset);

        $trickCards=  $this->renderView('trick/_trick_card.html.twig', ['tricks' => $tricks]);

        return new Response($trickCards);
    }

    #[Route('/homepage/total-tricks', name: 'homepage_total_tricks')]
    public function totalTricks(TrickRepository $trickRepository): JsonResponse
    {
        $total = $trickRepository->count([]);

        return $this->json(['total' => $total]);
    }

}
