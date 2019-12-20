<?php

namespace App\Form;

use App\Entity\Annonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RechercheType extends AbstractType
{
    protected function buildChoices($repo, $labelField) {
        $choices = [];
        $records    = $repo->findAll();
        $method = "get" . ucfirst($labelField);
        foreach ($records as $record) {
            $choices[$record->getId()] = $record->$method();
        }

        return $choices;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        extract($options);
        $categories = $this->buildChoices($categorieRepository, "Titre");
        $membres = $this->buildChoices($membreRepository, "pseudo");

        $builder
            ->add('categorie_id', ChoiceType::class,
                [ "choices" => $categories ,
                    "choice_label" => function ($cats, $ind, $val){
                        return ucfirst($val);
                    }
                ])
            ->add('membre_id', ChoiceType::class,
                [ "choices" => $membres ,
                    "choice_label" => function ($cats, $ind, $val){
                        return ucfirst($val);
                    }
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
        $resolver->setRequired("categorieRepository");
        $resolver->setRequired("membreRepository");

    }

}






