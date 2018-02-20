<?php

namespace App\Form;

use App\Entity\District;
use App\Entity\Post;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        // Champ Titre du post.
            ->add('title',TextType::class)

        // Champ Description du post.
            ->add('content',TextareaType::class)

        // Champ Image du post.
            ->add('image',FileType::class,

                    ['constraints'=>
                        [
                        new NotBlank(['message'=>'Vous n\'avez pas choisi de fichier']),
                        new Image(['maxSize'=>'5000K',
                                   'maxSizeMessage'=>'La taille de l\'image ne doit pas dépasser {{ limit }} {{ suffix }}',
                                   'mimeTypes'=>['image/jpg','image/png'],
                                   'mimeTypesMessage'=>'Le fichier doit être une image de type jpg - jpeg - png',
                                  ])
                        ],

                    'data_class'=> null
                    ]
                )

        //Champ Auteur du post.
            ->add('author',EntityType::class,
                ['class'=>'App\Entity\Author',
                  'choice_label'=>'Firstname',
                  'multiple'=>false
                ]
                )

        // Champ Quartier
            ->add('district',EntityType::class,
                    [
                       'class'=>'App\Entity\District',
                       'choice_label'=>'name',
                       'multiple'=>false
                    ]
                 )
        //Champ catégorie du post.
            ->add('category',EntityType::class,
                    [
                        'class'=>'App\Entity\Category',
                        'choice_label'=>'country',
                        'multiple'=>false
                     ]
                 )

            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => Post::class,
        ]);
    }
}
