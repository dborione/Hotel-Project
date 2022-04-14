<?php

namespace App\Controller\Admin;

use App\Entity\Manager;
use App\Entity\Suite;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

//$ManagerRepository = $this->entityManager->getRepository(Manager::class);

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
            //NumberField::new('suitePrice'),
            MoneyField::new('suitePrice')->setCurrency('EUR'),
            //CollectionField::new('manager')->allowAdd(true)
            AssociationField::new('manager')
            //AssociationField::new('manager')->setFormTypeOption('disabled', true),
            //AssociationField::new('manager')->setQueryBuilder(
            //    $ManagerRepository->createQueryBuilder('manager')
            //        ->where('entity.some_property = :some_value')
            //        ->setParameter('some_value', '...')
            //
        ];

    }
}
