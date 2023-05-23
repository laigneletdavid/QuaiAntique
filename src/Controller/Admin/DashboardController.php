<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Contact;
use App\Entity\Dishe;
use App\Entity\Formule;
use App\Entity\Menu;
use App\Entity\Photo;
use App\Entity\Reservation;
use App\Entity\Restaurant;
use App\Entity\Shedule;
use App\Entity\SheduleResa;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin')]

    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig', [
            'title_admin' => 'Bienvenue sur votre espace d\'administration',

            //'site' => $site,
        ]);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('QuaiAntique');
    }


    public function configureMenuItems(): iterable
    {

        yield MenuItem::section('Navigation');

        yield MenuItem::linkToUrl('Tableau de bord', 'fa fa-gauge', $this->generateUrl('admin'));
        yield MenuItem::linkToUrl('Aller sur le site', 'fa fa-undo', $this->generateUrl('app_home'));

        yield MenuItem::section('Réglages');

        yield MenuItem::linkToCrud('Identité du restaurant', 'fas fa-gear', Restaurant::class)
            ->setAction(Crud::PAGE_DETAIL)->setEntityId(1);

        yield MenuItem::subMenu('Les réservations', 'fas fa-utensils')->setSubItems([
           MenuItem::linkToCrud('Toutes les réservations', 'fas fa-utensils', Reservation::class),
            MenuItem::linkToCrud('Ajouter une réservation', 'fas fa-plus', Reservation::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Tous les horaires de réservation', 'fas fa-clock', SheduleResa::class),
            MenuItem::linkToCrud('Ajouter un horaire de réservation', 'fas fa-plus', SheduleResa::class)->setAction(Crud::PAGE_NEW),

        ]);

        yield MenuItem::linkToCrud('Messagerie', 'fas fa-envelope', Contact::class);

        yield MenuItem::subMenu('Les plats', 'fas fa-stroopwafel')->setSubItems([
            MenuItem::linkToCrud('Tous les plats', 'fas fa-stroopwafel', Dishe::class),
            MenuItem::linkToCrud('Ajouter un plat', 'fas fa-plus', Dishe::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Catégories', 'fas fa-list', Category::class),
            MenuItem::linkToCrud('Ajouter une catégorie', 'fas fa-plus', Category::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Les menus', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Touts les menus', 'fas fa-bars', Menu::class),
            MenuItem::linkToCrud('Ajouter un menu', 'fas fa-plus', Menu::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Toutes les formules', 'fas fa-gear', Formule::class),
            MenuItem::linkToCrud('Ajouter une formule', 'fas fa-plus', Formule::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Photos', 'fas fa-image')->setSubItems([
            MenuItem::linkToCrud('Toutes les photos', 'fas fa-image', Photo::class),
            MenuItem::linkToCrud('Ajouter une photo', 'fas fa-plus', Photo::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Horaires', 'fas fa-clock')->setSubItems([
            MenuItem::linkToCrud('Tous les horaires', 'fas fa-clock', Shedule::class),
            MenuItem::linkToCrud('Ajouter un horaire', 'fas fa-plus', Shedule::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::subMenu('Utilisateurs', 'fas fa-user')->setSubItems([
            MenuItem::linkToCrud('Toutes les utilisateurs', 'fas fa-user-friends', User::class),
            MenuItem::linkToCrud('Ajouter un utilisateur', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
        ]);


    }


}
