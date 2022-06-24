<?php

namespace App\Controller\Admin;

use App\Entity\Suite;
use App\Entity\Manager;
use Doctrine\ORM\QueryBuilder;
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
        $manager = $this->getUser();


        return [
            TextField::new('suiteName'),
            TextField::new('suiteSlug'),
            TextEditorField::new('suiteDescription'),
            MoneyField::new('suitePrice')->setCurrency('EUR')->setRequired(true),
            //AssociationField::new('manager')->allowMultipleChoices(true),
            AssociationField::new('hotel'),
            //AssociationField::new('manager', $manager)->setFormTypeOption('disabled', true)->hideOnForm()->autocomplete()
            AssociationField::new('manager')

            //AssociationField::new('manager')
            //->autocomplete()
            /* ->setQueryBuilder(function (QueryBuilder $qb) {
                $qb->andWhere('entity.hotel = :hotel')
                    ->setParameter('enabled', true); */
            /* AssociationField::new('manager')->setQueryBuilder(
                $ManagerRepository->createQueryBuilder('manager')
                    ->where('hotel.manager = :$manager')
                    ->setParameter('some_value', '...')) */
            //})
        ];

        

    }
}
