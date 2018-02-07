<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('image',FileType::class)

        //Champ Auteur du post.
            ->add('author',EntityType::class,
                ['class'=>'App\Entity\Author',
                  'choice_label'=>'Firstname',
                  'multiple'=>false
                ]
                )
        //Champ catégorie du post.
            ->add('category',EntityType::class,
                 ['class'=>'App\Entity\Category',
                  'choice_label'=>'name',
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
