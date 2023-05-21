<?php

namespace App\Controller\Admin;

use App\Entity\SheduleResa;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class SheduleResaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SheduleResa::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return parent::configureCrud($crud)
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des horaires')
            ->setPageTitle(Crud::PAGE_NEW, 'Créez un horaire');
    }


    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('shedule', 'Horaire au format "12h00" ');

        yield ChoiceField::new('period', 'Période de la journée')
            ->setChoices([
                'Midi' => 'Midi',
                'Soir' => 'Soir',
            ]);
    }

}
