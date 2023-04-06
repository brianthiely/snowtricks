<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Trick;
use App\Form\CommentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    #[Route('/comment/add/{trickId}', name: 'comment-add', methods: ['POST'])]
    public function addComment(Request $request, $trickId, EntityManagerInterface $em): Response
    {
        $trick = $em->getRepository(Trick::class)->find($trickId);
        if (!$trick) {
            throw $this->createNotFoundException('Trick not found');
        }

        $comment = new Comment();
        $comment->setTrick($trick);
        $comment->setUser($this->getUser());

        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($comment);
            $em->flush();

            $this->addFlash('success', 'Your comment has been added!');

            return $this->redirectToRoute('trick-show', ['trick_category' => $trick->getCategory(), 'slug' => $trick->getSlug()]);
        }

        $comments = $trick->getComments();

        return $this->render('trick/show.html.twig', compact('trick','form', 'comments'));
    }
}
