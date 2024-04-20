<?php

namespace App\Controller\Admin;

use App\Entity\Watering;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class WateringCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Watering::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Arrosage')
            ->setEntityLabelInPlural('Arrosage')
            ->setPageTitle('index', 'Liste des %entity_label_singular%')
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('name', 'Arrosage'),
        ];
    }
}
