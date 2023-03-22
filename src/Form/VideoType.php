<?php

namespace App\Form;

use App\Entity\Video;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Regex;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('embedCode', TextAreaType::class, [
                'label' => 'Code d\'intégration',
                'attr' => [
                    'placeholder' => 'Code d\'intégration de la vidéo'
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^<iframe.*<\/iframe>$/',
                        'message' => 'Le champ ne peut contenir que des balises iframe.'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}
