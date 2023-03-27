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
use Symfony\Component\Security\Http\Attribute\IsGranted;

class CommentController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/comment/add/{trick}', name: 'comment-add')]
    public function addComment(Request $request, Trick $trick, EntityManagerInterface $em): Response
    {
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

        return $this->render('comment/add.html.twig', [
            'trick' => $trick,
            'form' => $form->createView(),
        ]);
    }


}
