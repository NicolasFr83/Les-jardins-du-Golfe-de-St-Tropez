<?php

namespace App\Controller\Admin;

use App\Entity\Opening;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class OpeningCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Opening::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Horaires d\'ouverture')
            ->setEntityLabelInPlural('Horaires d\ouverture')
            ->setPageTitle('index', '%entity_label_singular%')
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            AssociationField::new('enterprise', 'Entreprise'),
            TextField::new('openingday','Jous d\'ouverture'),
            TextField::new('openinghourmorning','Heure d\'ouverture du matin'),
            TextField::new('closinghourmorning','heure de fermeture du matin'),
            TextField::new('openinghourafternoon','heure d\'ouverture de l\'après-midi'),
            TextField::new('closinghourafternoon', 'heure de fermeture du soir'),
        ];
    }
}
