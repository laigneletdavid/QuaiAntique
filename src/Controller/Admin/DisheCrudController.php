<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Dishe;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DisheCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dishe::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('name', 'Nom du plat');

        yield AssociationField::new('category', 'Catégorie du plat');
        yield TextField::new('description', 'Description du plat au format "12.00" pour 12,00 €');
        yield MoneyField::new('price', 'Prix du plat')
            ->setCurrency('EUR')
            ->setNumDecimals(2);
        yield BooleanField::new('visible', 'Visible');

    }

}
