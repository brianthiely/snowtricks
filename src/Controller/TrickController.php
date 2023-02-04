<?php

namespace App\Controller;

use App\Entity\Trick;
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
    public function create(FormFactoryInterface $factory, Request $request,
                           SluggerInterface $slugger, EntityManagerInterface
                           $em):
    Response
    {
        $builder = $factory->createBuilder(FormType::class, null, [
            'data_class' => Trick::class
        ]);

        $builder->add('name', TextType::class, [
            'label' => 'Nom du trick',
            'attr' => [
                'placeholder' => 'Indiquer le noms du trick'
            ]
        ])
                ->add('description', TextareaType::class, [
                    'label' => 'Description du trick',
                    'attr' => [
                        'placeholder' => 'Expliquer le trick'
                    ]
                ])
                ->add('pictures', CollectionType::class, [
                    'label' => 'Image du trick',
                    'attr' => [
                        'placeholder' => 'Indiquer l\'url de l\'image'
                    ],
                    'prototype' => true,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ])
                ->add('videos', CollectionType::class, [
                    'label' => 'Vidéo du trick',
                    'attr' => [
                        'placeholder' => 'Indiquer l\'embed code de la vidéo'
                    ],
                    'prototype' => true,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                ])
                ->add('category', ChoiceType::class, [
                    'label' => 'Catégorie',
                    'placeholder' => '-- Choisir une catégorie --',
                    'choices' => [
                        'Grabs' => 'Grabs',
                        'Rotations' => 'Rotations',
                        'Flips' => 'Flips',
                        'Slides' => 'Slides',
                        'One foot tricks' => 'One foot tricks',
                        'Old school' => 'Old school',
                        'Other' => 'Other'
                    ]
                ]);


        $form = $builder->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $trick = $form->getData();
            $trick->setSlug(strtolower($slugger->slug($trick->getName())));

            $em->persist($trick);
            $em->flush();
            dd($trick);
        }

        $formView = $form->createView();

        return $this->render('trick/create.html.twig', compact('formView'));
    }



}
