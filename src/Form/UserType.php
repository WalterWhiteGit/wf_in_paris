<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder->add('firstname',TextType::class,
            [
            'constraints'=>[

                        new Length(['min'=>2,
                                'max'=>50,
                                'minMessage'=>'Votre prénom doit contenir au moins {{ limit }} caractéres',
                                'maxMessage'=>'Votre prénom doit contenir au maximum {{ limit }} caractères '
                               ]),
                        new Regex(['pattern'=>'/^[a-zA-Z]+$/i',
                                  'message'=>'Votre prénom doit contenir uniquement des lettres'
                               ])
                    ]
                ]
                )



            ->add('lastname',TextType::class,

                 ['constraints'=>
                    [
                        new Length(['min'=>2,
                                    'max'=>50,
                                    'minMessage'=>'Votre nom doit contenir au moins {{ limit }} caractères',
                                    'maxMessage'=>'Votre nom doit contenir au maximum {{ limit }} caractères'
                                   ]),
                        new Regex(['pattern'=>'/^[a-zA-Z]+$/i',
                                   'message'=>'This file is not a valid image.'
                                  ])
                    ]
                 ]

                )
            ->add('sexe',ChoiceType::class,
                ['expanded'=>true,
                 'choices'=>['W' =>'F','M' => 'M']

                ])

            ->add('password',RepeatedType::class,

                [   'type' => PasswordType::class,
                    'invalid_message' => 'The password fields must match.',
                    'first_options'  => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repeat Password')
                ]
            )
            ->add('username',TextType::class)

            ->add('mail',EmailType::class,
                ['constraints'=>
                    new Email(['checkMX'=>true,
                               'checkHost'=>true
                              ])
                ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => User::class,
        ]);
    }




}
