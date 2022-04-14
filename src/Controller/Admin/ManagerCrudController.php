<?php

namespace App\Controller\Admin;

use App\Entity\Manager;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

//#[Route('/managers', name: 'app_managers')]
class ManagerCrudController extends AbstractCrudController
{
    //$hotelmanager->setRoles(["ROLE_MANAGER"]);

    public static function getEntityFqcn(): string
    {
        return Manager::class;
        //property: 'roles';
    }

    public function configureFields(string $pageName): iterable
    {
        //yield AssociationField::new('hotel');
        //yield AssociationField::new('admin');
        $roles = [
            'Manager' => 'ROLE_MANAGER'];

        return [
            TextField::new('managerFirstName'),
            TextField::new('managerLastName'),
            TextField::new('Email'),
            TextField::new('Password'),
            //ChoiceField::new('Roles');
            //TextField::new('Password'),
            //->setRoles(["ROLE_MANAGER"]);
            //->add('userRoles')
            AssociationField::new('hotel'),

            //ChoiceField::new('roles')
                ///->setChoices($roles)
                //->setChoices(array_combine($roles, $roles))
                //->allowMultipleChoices('disabled', true)
                ///->autocomplete(true)
                //->renderExpanded()
                ///->renderAsBadges()
            
            ChoiceField::new('roles', 'Roles')
                //->setChoices(['Manager' => 'ROLE_MANAGER'])
                ->autocomplete(true)
                ->setChoices(array_combine($roles, $roles))
                ->allowMultipleChoices()
                ->renderExpanded()
                
                




            //ArrayField::new('roles')
        ];
        
            
    }

    
}
