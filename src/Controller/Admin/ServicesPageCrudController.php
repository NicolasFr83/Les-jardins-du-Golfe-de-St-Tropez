<?php

namespace App\Controller\Admin;

use App\Entity\ServicesPage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;

class ServicesPageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServicesPage::class;
    }

public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Page de service')
            ->setEntityLabelInPlural('pages des services')
            ->setPageTitle('index', 'liste des %entity_label_plural%')
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->remove(Crud::PAGE_INDEX, Action::NEW)
            ->remove(Crud::PAGE_INDEX, Action::DELETE);
    }


public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('title', 'Titre'),
            TextareaField::new('servicesPresentation', 'Présentation des services entretien'),
            TextareaField::new('creationPresentationText', 'Présentation des services création'),
            TextareaField::new('specialServicesText', 'Présentation des services spécialisés'),
        ];
    }
}
