<?php

namespace App\Controller\Admin;

use App\Entity\Manager;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
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
        //$roles =['ROLE_MANAGER'];

        return [
            TextField::new('managerFirstName'),
            TextField::new('managerLastName'),
            TextField::new('Email'),
            TextField::new('Password'),
            //TextField::new('Password'),
            //->setRoles(["ROLE_MANAGER"]);
            //->add('userRoles')
            AssociationField::new('hotel')
                ->setHelp('Please create a new Hotel before selecting an hotel in this field!'),

            //ChoiceField::new('roles')
                ///->setChoices($roles)
                //->setChoices(array_combine($roles, $roles))
                //->allowMultipleChoices('disabled', true)
                ///->autocomplete(true)
                //->renderExpanded()
                ///->renderAsBadges()
            
            //second parameter gives what is written in easyadmin
            ChoiceField::new('roles', 'Role')
                //->setChoices(['Manager' => 'ROLE_MANAGER'])
                //->autocomplete(true)
                ->setChoices(array_combine($roles, $roles))
                ->allowMultipleChoices()
                ->renderExpanded()
                //->renderAsBadges()
          
            //ArrayField::new('roles')
            
        ];
    }
    
}
