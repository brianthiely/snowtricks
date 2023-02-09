<?php

namespace App\Controller;

use App\Entity\Picture;
use App\Entity\Trick;
use App\Form\TrickType;
use App\Repository\TrickRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormFactoryInterface;
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

    #[Route('/trick/create', name: 'trick-create')]
    public function create(Request $request,
                           SluggerInterface $slugger, EntityManagerInterface
                           $em):
    Response
    {
        $form = $this->createForm(TrickType::class);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            /** @var Trick $trick */
            $trick = $form->getData();
            $trick->setSlug(strtolower($slugger->slug($trick->getName())));

//            $trick->setCreatedAt(new \DateTimeImmutable());
//            foreach ($trick->getPictures() as $picture) {
//                $picture->setCreatedAt(new \DateTimeImmutable());
//            }
//            foreach ($trick->getVideos() as $video) {
//                $video->setCreatedAt(new \DateTimeImmutable());
//            }
//            $trick->setUpdatedAt(new \DateTimeImmutable());
//            foreach ($trick->getPictures() as $picture) {
//                $picture->setUpdatedAt(new \DateTimeImmutable());
//            }
//            foreach ($trick->getVideos() as $video) {
//                $video->setUpdatedAt(new \DateTimeImmutable());
//            }


            $em->persist($trick);
            $em->flush();
            dd($trick);
        }

        $formView = $form->createView();

        return $this->render('trick/create.html.twig', compact('formView'));
    }
}
