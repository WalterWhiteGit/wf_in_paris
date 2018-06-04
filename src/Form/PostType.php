<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\District;
use App\Entity\Restaurant;
use App\Entity\Post;
use App\Repository\CategoryRepository;
use App\Repository\DistrictRepository;
use App\Repository\RestaurantRepository;
use function PHPSTORM_META\type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

        // Champ Titre du post.



            ->add('title',TextType::class,
                    ['constraints'=>
                        [
                            new NotBlank(['message'=>'Le champ ne doit pas être vide']),
                            new Length(['min'=>6,
                                        'max'=>100,
                                        'minMessage'=>'Le titre doit être supérieur à {{ limit }} caractéres',
                                        'maxMessage'=>'Le titre doit être inférieur à {{ limit }} caractéres'
                                ])

                        ]
                    ]
            )



        // Champ Image du post.
            ->add('image',FileType::class,

                    ['constraints'=>
                        [
                            new NotBlank(['message'=>'Vous n\'avez pas choisi de fichier']),
                            new Image(['maxSize'=>'5000K',
                                   'maxSizeMessage'=>'La taille de l\'image ne doit pas dépasser {{ limit }} {{ suffix }}',
                                   'mimeTypes'=>['image/jpeg','image/png'],
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
                  'multiple'=>false,

                    ]
                )

        // Champ Quartier
            ->add('district',EntityType::class,
                    [
                       'class'=>'App\Entity\District',
                       'choice_label'=>'name',
                       'multiple'=>false,
                        'query_builder' => function (DistrictRepository $district){

                            return  $district->displayByOrderName();
                        }
                    ]
                 )
        //Champ catégorie du post.
            ->add('category',EntityType::class,
                    [
                        'class'=>'App\Entity\Category',
                        'choice_label'=>'name',
                        'multiple'=>false,
                        'query_builder'=> function (CategoryRepository $category){

                            return $category->displayByOrderName();

                        }

                     ]
                 )

            ->add('restaurant',EntityType::class,
                    [
                        'class'=>'App\Entity\Restaurant',
                        'choice_label'=>'name',
                        'multiple'=>false,
                        'query_builder'=> function (RestaurantRepository $restaurant){

                            return $restaurant->displayByOrderName();
                        }
                    ]
                )

            // Champ synopsis de l'article

            ->add('synopsis',TextareaType::class

                )

            // Champ Description du post.
            ->add('content',CKEditorType::class,
                [
                    'config'=>['toolbar'=>'standard']
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
