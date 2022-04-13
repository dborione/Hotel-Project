<?php

namespace App\Controller\Admin;

use App\Entity\Hotel;
use App\Entity\Manager;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Doctrine\Persistence\ObjectManager;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HotelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hotel::class;
    }

    public function load(ObjectManager $manager)
    {
        $manager = new Manager();
    }
    
    public function configureFields(string $pageName): iterable
    {
        //yield AssociationField::new('manager');

        return [
            TextField::new('hotelName'),
            TextField::new('hotelCity'),
            TextField::new('hotelAddress'),
            //IdField::new('manager_id'),
            //IdField::new('admin_id'),
            TextField::new('hotelSlug'),
            TextEditorField::new('hotelDescription'),
            AssociationField::new('manager')
           
            TextField::new('managerLastName'),
            TextField::new('managerFirstName'),
            TextField::new('Email'),
            TextField::new('Password'),
            //ChoiceField::new('Roles');
            //TextField::new('Password'),
            //->setRoles(["ROLE_MANAGER"]);
            //->add('userRoles')
            )
        ];


    }
    
}
