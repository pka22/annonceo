<?php

namespace App\Form;

use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        extract($options);
        $builder

            ->add('pseudo')
            ->add('mdp')
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('email')
            ->add('civilite')
            ->add('statut')
            ->add('date_enregistrement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Membre::class,
        ]);
    }
}
