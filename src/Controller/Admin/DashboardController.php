<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ContactPage;
use App\Entity\Topics;
use App\Entity\HomePage;
use App\Entity\ServicesPage;
use App\Entity\Category;
use App\Entity\Exposition;
use App\Entity\Enterprise;
use App\Entity\Exposure;
use App\Entity\FormContact;
use App\Entity\Opening;
use App\Entity\Opinion;
use App\Entity\Tips;
use App\Entity\Watering;
use App\Entity\User;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Les Jardins Du Golfe De St Tropez');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Page de contact', 'fa-regular fa-file', ContactPage::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Page de la pépinière', 'fa-regular fa-file', Topics::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Page d\'accueil' , 'fa-regular fa-file', HomePage::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Page de nos services', 'fa-regular fa-file', ServicesPage::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Sujets', 'fa-solid fa-tree', Topics::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Catégories', 'fa-solid fa-tree', Category::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Exposition', 'fa-regular fa-sun', Exposition::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Entreprise', 'fa-solid fa-toolbox', Enterprise::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Lieu de plantation', 'fa-solid fa-sun', Exposure::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Formulaire de contact', 'fa-solid fa-headset', FormContact::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Horaires d\'ouverture', 'fa-regular fa-clock', Opening::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Avis', 'fa-solid fa-headset', Opinion::class);
        yield MenuItem::linkToCrud('Astuces', 'fa-solid fa-screwdriver-wrench', Tips::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Arrosage', 'fa-solid fa-screwdriver-wrench', Watering::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linktocrud('Utilisateur', 'fa-solid fa-person', User::class)
            ->setPermission('ROLE_ADMIN');

    }
}
