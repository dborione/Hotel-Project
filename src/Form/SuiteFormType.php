<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class SuiteFormType extends AbstractType
{
    //private $security;

    //public function __construct(Security $security)
    //{
    //$this->security = $security; 
    //}

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        //$client = $this->security->getUser();

        $builder
            ->add('startDate', DateType::class, array(
                'widget' => 'single_text', 
                'format' => 'yyyy-MM-dd', 
            ), 'invalid-message')
            ->add('endDate', DateType::class, array(
                'widget' => 'single_text', 
                'format' => 'yyyy-MM-dd', 
            ))
            //->add('suite')
            //->add('client')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
