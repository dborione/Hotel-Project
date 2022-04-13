<?php

namespace App\Controller\Admin;

use App\Entity\Suite;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SuiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Suite::class;
    }

    public function configureFields(string $pageName): iterable
    {
        
        return [
            TextField::new('suiteName'),
            TextField::new('suiteSlug'),
            TextEditorField::new('suiteDescription'),
            TextField::new('suitePrice'),
            AssociationField::new('manager'),
            //AssociationField::new('hotel')
        ];


    }
}
