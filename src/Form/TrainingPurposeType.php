<?php

namespace App\Form;

use App\Entity\Equipment;
use App\Entity\Training;
use App\Entity\User;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrainingPurposeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class, [
                'label' => 'Nom du cours'
            ])
            ->add('description', CKEditorType::class, [
                'required' => false,
                'label'    => 'Description'
            ])
            ->add('url', TextType::class, [
                'label' => 'Image illustrant le cours décrit'
            ])
            ->add('users', EntityType::class, [
                'class'        => User::class,
                'choice_label' => 'name',
                'label'        => 'Nom du prof'
            ])
            ->add('equipment', EntityType::class, [
                'class'        => Equipment::class,
                'choice_label' => 'name',
                'label'        => 'Choix de l\'équipement'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Training::class,
        ]);
    }
}
