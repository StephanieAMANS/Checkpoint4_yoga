<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Ton surnom',
                'attr' => [
                    'class' => 'border border-dark'
                ]
            ])
            ->add('email', TextType::class, [
                'label' => 'Ton email',
                'attr' => [
                    'class' => 'border border-dark'
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'label' => 'Ton role',
                'choices' => [
                    'prof' => 'ROLE_USER',
                    'élève' => 'ROLE_STUDENT'
                ],
                'mapped' => false,
                'attr' => [
                    'class' => 'border border-dark'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'En créant un compte, vous acceptez de vous conformer à la Politique de confidentialité
                 et aux Conditions générales de Instant zen',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'J\'accepte les conditions générales d\'utilisation .',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Ton mot de passe',
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'class' => 'border border-dark'
                    ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
