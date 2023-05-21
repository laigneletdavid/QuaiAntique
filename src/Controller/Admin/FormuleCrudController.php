<?php

namespace App\Controller\Admin;

use App\Entity\Formule;
use App\Entity\Menu;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FormuleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Formule::class;
    }


    public function configureFields(string $pageName): iterable
    {

        yield TextField::new('content', 'Description de la formule');

        yield AssociationField::new('menu', 'Menu qui contiendra la formule');

        yield MoneyField::new('price', 'Prix de la formule')
            ->setCurrency('EUR')
            ->setNumDecimals(2);

        yield TextField::new('period', 'Indiquer si il y a une périodicité à la formule');

    }

}
