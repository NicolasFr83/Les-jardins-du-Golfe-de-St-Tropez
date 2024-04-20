<?php

namespace App\Controller\Admin;

use App\Entity\Topics;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class TopicsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Topics::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Sujet')
            ->setEntityLabelInPlural('Sujets')
            ->setPageTitle('index', 'liste des %entity_label_plural%')
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            TextField::new('name', 'Nom'),
            TextField::new('latinName', 'Nom en latin'),
            TextareaField::new('description', 'Description'),
            TextField::new('imageFile')
                ->setFormType(VichImageType::class),
            ImageField::new('imageName', 'Photo du sujet')
                ->setBasePath('/uploads/plants')
                ->onlyOnIndex(),
            AssociationField::new('watering', 'Arrosage'),
            AssociationField::new('exposure', 'Lieu de plantation'),
            AssociationField::new('exposition', 'Exposition'),
            AssociationField::new('category', 'Catégorie'),
            
        ];
    }
}
