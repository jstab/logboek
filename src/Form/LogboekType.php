<?php

namespace App\Form;

use App\Entity\Logboek;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LogboekType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brief_nr')
            ->add('datum', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('kubs')
            ->add('laadplaats')
            ->add('vertrektijd')
            ->add('bestemming')
            ->add('evenement')
            ->add('user')
            ->add('chauffeur')
            ->add('truck')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Logboek::class,
        ]);
    }
}
