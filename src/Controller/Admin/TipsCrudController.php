<?php

namespace App\Controller\Admin;

use App\Entity\Tips;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextAreaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class TipsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tips::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Astuce')
            ->setEntityLabelInPlural('Astuces')
            ->setPageTitle('index', '%entity_label_singular%')
            ->setPaginatorPageSize(10);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('name', 'Titre de la section astuce'),
            TextAreaField::new('description', 'Description de la section astuce'),
        ];
    }
}
