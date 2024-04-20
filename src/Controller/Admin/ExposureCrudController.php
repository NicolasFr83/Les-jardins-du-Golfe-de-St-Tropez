<?php

namespace App\Controller\Admin;

use App\Entity\Exposure;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class ExposureCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Exposure::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Lieu de plantation')
            ->setEntityLabelInPlural('Lieu de plantations')
            ->setPageTitle('index', 'liste des %entity_label_singular%')
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('name', 'Lieu de plantation'),
        ];
    }
}
