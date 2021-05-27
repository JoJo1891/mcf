<?php

namespace App\Form;

use App\Entity\Resos;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ResosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', ChoiceType::class, [
                'choices'  => [
                    'Instagram' => "Instagram",
                    'Facebook' => "Facebook",
                    'Snapchat' => "Snapchat",
                    'Twitter' => "Twitter",
                ],
            ])
            ->add('liens')
            ->add('coiffeurID')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Resos::class,
        ]);
    }
}
