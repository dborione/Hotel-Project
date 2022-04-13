<?php

namespace App\Controller\Admin;

use App\Entity\Manager;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

//#[Route('/managers', name: 'app_managers')]
class ManagerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Manager::class;
    }

    public function configureFields(string $pageName): iterable
    {
        //yield AssociationField::new('hotel');
        //yield AssociationField::new('admin');

        return [
            TextField::new('managerLastName'),
            TextField::new('managerFirstName'),
            TextField::new('Email'),
            TextField::new('Password'),
            //TextField::new('Password'),
            
        ];
    }
    
}
