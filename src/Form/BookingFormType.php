<?php

namespace App\Form;

use App\Entity\Booking;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BookingFormType extends AbstractType
{
    
    public function buildForm(FormBuilderInterface $builder, array $options): void 
    {
        $builder
            ->add('bookingStartDate')
            ->add('bookingEndDate')
            ->add('clientId')
            ->add('suiteId')
            //get client id from session
            //->add($session->get('client.id'))
            //get suite id from page
            //->add('NumberofPeople')
        ;
    }

    //public function configureOptions(OptionsResolver $resolver): void
    //{
    //    $resolver->setDefaults([
    //        'data_class' => Booking::class,
    //    ]);
    //}
}
