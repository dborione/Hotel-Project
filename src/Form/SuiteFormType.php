<?php

namespace App\Form;

use App\Entity\Booking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class SuiteFormType extends AbstractType
{
  
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('startDate', DateType::class, array(
                'widget' => 'single_text', 
                'format' => 'yyyy-MM-dd', 
                'constraints' => [
                    new NotBlank(),
                    new DateTime()],
            ), 
            'invalid-message') 
               
            ->add('endDate', DateType::class, array(
                'widget' => 'single_text', 
                'format' => 'yyyy-MM-dd', 
                'constraints' => [
                    new NotBlank(),
                    new DateTime(),

                    // this is to prevent that the start date is after the end date
                    new Callback(function($object, ExecutionContextInterface $context) {
                        $startDate = $context->getRoot()->getData()['startDate'];
                        $endDate = $object;
        
                        if (is_a($startDate, DateTime::class) && is_a($endDate, DateTime::class)) {
                            if ($endDate->format('U') - $startDate->format('U') < 1) {
                                $context
                                    ->buildViolation('End date must be after start date.')
                                    ->addViolation();
                            }
                        }
                    }),
                ],
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
