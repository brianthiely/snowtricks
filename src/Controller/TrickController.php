<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Trick;
use App\Form\TrickType;
use App\Repository\TrickRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class TrickController extends AbstractController
{
    #[Route('/category/{trick_category}/{slug}', name: 'trick-show')]
    public function show($slug, TrickRepository $trickRepository): Response
    {
        $trick = $trickRepository->findOneBy(['slug' => $slug]);

        if(!$trick){
            throw $this->createNotFoundException('Trick not found');
        }
        return $this->render('trick/show.html.twig', compact('slug', 'trick'));
    }

    #[Route('/trick/{id}/edit', name: 'trick-edit')]
    public function edit($id, TrickRepository $trickRepository , Request
    $request,EntityManagerInterface $em): Response
    {
        $trick = $trickRepository->find($id);

        $form = $this->createForm(TrickType::class, $trick);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            return $this->redirectToRoute('trick-show', ['trick_category' => $trick->getCategory()
                ,'slug' =>
                    $trick->getSlug()]);
        }

        $form = $form->createView();

        return $this->render('trick/edit.html.twig', compact('form', 'trick'));
    }


    #[Route('/trick/create', name: 'trick-create')]
    public function create(Request $request, EntityManagerInterface $em, SluggerInterface $slugger):
    Response
    {
        $trick = new Trick();
        $form = $this->createForm(TrickType::class, $trick);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $trick->setSlug(strtolower((string)$slugger->slug($trick->getName())));
            $em->persist($trick);
            $em->flush();

            return $this->redirectToRoute('trick-show', ['trick_category' => $trick->getCategory()
                ,'slug' =>
                    $trick->getSlug()]);
        }
        return $this->render('trick/create.html.twig', compact('form'));
    }
}
