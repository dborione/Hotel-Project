<?php

namespace App\Controller\Admin;

use App\Entity\Hotel;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HotelCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Hotel::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('manager');

        return [
            TextField::new('hotelName'),
            TextField::new('hotelCity'),
            TextField::new('hotelAddress'),
            //IdField::new('manager_id'),
            //IdField::new('admin_id'),
            TextField::new('hotelSlug'),
            TextEditorField::new('hotelDescription'),
            //AssociationField::new('manager')
        ];


    }
    
}
