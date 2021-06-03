<?php

namespace App\Controller\Admin;

use App\Entity\Professional;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProfessionalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Professional::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('firstName');
        yield TextField::new('lastName');
        yield TextField::new('companyName');
        yield TextEditorField::new('description')->hideOnIndex();
        yield TextEditorField::new('rates')->hideOnIndex();
        yield AssociationField::new('user')->onlyWhenCreating();
    }
}
