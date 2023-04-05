<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentType;
use App\Form\TrickType;
use App\Repository\CommentRepository;
use App\Repository\TrickRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Component\String\Slugger\SluggerInterface;

class TrickController extends AbstractController
{
    #[Route('/category/{trick_category}/{slug}', name: 'trick-show')]
    public function show($slug, TrickRepository $trickRepository): Response
    {
        $trick = $trickRepository->findOneBy(['slug' => $slug]);

        if (!$trick) {
            throw $this->createNotFoundException('Trick not found');
        }

        $comments = $trick->getComments();

        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment, [
        'action' => $this->generateUrl('comment-add', ['trickId' => $trick->getId()]),
        'method' => 'POST',
        ]);

        return $this->render('trick/show.html.twig', compact('trick', 'comments', 'form'));
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/trick/{id}/edit', name: 'trick-edit')]
    public function edit($id, TrickRepository $trickRepository,
                         SluggerInterface $slugger ,Request
    $request,EntityManagerInterface $em): Response
    {
        $trick = $trickRepository->find($id);

        $form = $this->createForm(TrickType::class, $trick);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            if($trick->getSlug() !== $form->get('name')->getData()){
                $trick->setSlug(strtolower((string)$slugger->slug($trick->getName())));
            }
            $em->flush();

            return $this->redirectToRoute('trick-show', ['trick_category' => $trick->getCategory()
                ,'slug' =>
                    $trick->getSlug()]);
        }

        $form = $form->createView();

        return $this->render('trick/edit.html.twig', compact('form', 'trick'));
    }


    #[IsGranted('ROLE_USER')]
    #[Route('/trick/create', name: 'trick-create')]
    public function create(Request $request, TrickRepository $trickRepository,
                           EntityManagerInterface $em,
                           SluggerInterface $slugger):
    Response
    {
        $trick = new Trick();
        $form = $this->createForm(TrickType::class, $trick);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            if($trickRepository->findOneBy(['name' => $trick->getName()])){
                $this->addFlash('danger', 'Ce trick existe déjà');
                return $this->render('trick/create.html.twig', compact('form'));
            }
            $trick->setSlug(strtolower((string)$slugger->slug($trick->getName())));
            $em->persist($trick);
            $em->flush();

            $this->addFlash('success', 'Trick créé avec succès');

            return $this->redirectToRoute('trick-show', ['trick_category' => $trick->getCategory()
                ,'slug' =>
                    $trick->getSlug()]);
        }
        return $this->render('trick/create.html.twig', compact('form'));
    }


    #[IsGranted('ROLE_USER')]
    #[Route('/trick/{id}/delete', name: 'trick-delete')]
    public function delete($id, TrickRepository $trickRepository, EntityManagerInterface $em): Response
    {
        $trick = $trickRepository->find($id);

        if(!$trick){
            throw $this->createNotFoundException('Trick not found');
        }

        $em->remove($trick);
        $em->flush();

        return $this->redirectToRoute('homepage');
    }
}
