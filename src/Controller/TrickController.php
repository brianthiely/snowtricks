<?php

namespace App\Controller;

use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
    #[Route('/{trick_category}/{slug}', name: 'trick-show')]
    public function show($slug, TrickRepository $trickRepository): Response
    {
        $trick = $trickRepository->findOneBy(['slug' => $slug]);

        if(!$trick){
            throw $this->createNotFoundException('Trick not found');
        }
        return $this->render('trick/show.html.twig', compact('slug', 'trick'));
    }
}
