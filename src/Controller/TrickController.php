<?php

namespace App\Controller;

use App\Repository\TrickRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrickController extends AbstractController
{
//    #[Route('/category/{slug}', name: 'app_trick')]
//    public function category($slug, TrickRepository $trickRepository): Response
//    {
//        $category = $trickRepository->findOneBy(['slug' => $slug]);
//
//        if(!$category){
//            throw $this->createNotFoundException('Category not found');
//        }
//
//        return $this->render('trick/category.html.twig', compact('slug', 'category'));
//    }

//    public function show($slug, TrickRepository $trickRepository): Response
//    {
//        $trick = $trickRepository->findOneBy(['slug' => $slug]);
//
//        if(!$trick){
//            throw $this->createNotFoundException('Trick not found');
//        }
//
//        return $this->render('trick/show.html.twig', compact('slug', 'trick'));
//    }
}
