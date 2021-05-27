<?php

namespace App\Form;

use App\Entity\Coiffeur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CoiffeurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo')
            ->add('cp')
            ->add('ville')
            ->add('certifpro')
            ->add('certifqua')
            ->add('coiffeurStyles')
            ->add('coifquis', ChoiceType::class, [
                'choices'  => [
                    'Homme' => 0,
                    'Femme' => 1,
                    'Homme & Femme' => 2,
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Coiffeur::class,
        ]);
    }
}
