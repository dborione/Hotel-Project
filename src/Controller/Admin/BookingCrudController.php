<?php

namespace App\Controller\Admin;

use App\Entity\Booking;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class BookingCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Booking::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('suite')->hideOnForm(),
            AssociationField::new('client')->hideOnForm(),
            DateField::new('startDate')->hideOnForm(),
            DateField::new('endDate')->hideOnForm(),
        ];
    }
    
}
