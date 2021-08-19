<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }


    public function configureFields(string $pageName): iterable
    {
        if(Crud::PAGE_INDEX === $pageName){
            yield TextField::new('email', 'Email');

        }

        if (Crud::PAGE_DETAIL === $pageName || Crud::PAGE_NEW === $pageName){
            yield TextField::new('email', 'Email');
            yield TextField::new('password', 'Contraseña');
        }
    }

}
