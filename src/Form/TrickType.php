<?php

namespace App\Form;

use App\Entity\Trick;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du trick',
                'attr' => [
                    'placeholder' => 'Indiquer le nom du trick'
                ]
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description du trick',
                'attr' => [
                    'placeholder' => 'Expliquer le trick'
                ]
            ])
            ->add('pictures', CollectionType::class, [
                'entry_type' => PictureType::class,
                'label' => false,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false,
            ])
            ->add('videos', CollectionType::class, [
                'entry_type' => VideoType::class,
                'label' => false,
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'error_bubbling' => false,
            ])
            ->add('category', ChoiceType::class, [
                'label' => 'Catégorie',
                'placeholder' => '-- Choisir une catégorie --',
                'choices' => [
                    'Grabs' => 'grabs',
                    'Rotations' => 'rotations',
                    'Flips' => 'flips',
                    'Slides' => 'slides',
                    'One-foot-tricks' => 'one-foot-tricks',
                    'Old-school' => 'old-school',
                    'Jibbing' => 'jibbing',
                    'Freestyle' => 'freestyle',
                    'Other' => 'other'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trick::class,
        ]);
    }
}
