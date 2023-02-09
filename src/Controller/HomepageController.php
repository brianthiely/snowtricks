<?php

namespace App\Controller;

use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(TrickRepository $trickRepository, int $offset = 0):
    Response
    {

        $tricks = $trickRepository->findAll();
//        $tricks = $trickRepository->findLatest(15, $offset);
        $pictures = $trickRepository->findAll();
        return $this->render('homepage/index.html.twig', compact('tricks', 'pictures'));
    }
}
