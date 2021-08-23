<?php

namespace App\Controller\Admin;

use App\Entity\Film;
use App\Form\ActorType;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class FilmCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Film::class;
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {

        if ($entityInstance->getPremiereAt() > new \DateTimeImmutable()){
            $entityInstance->setIsReleased(false);
        }

        else{
            $entityInstance->setIsReleased(true);
        }

        parent::persistEntity($entityManager, $entityInstance); // TODO: Change the autogenerated stub
    }

    public function configureFields(string $pageName): iterable
    {
       if (Crud::PAGE_DETAIL === $pageName || Crud::PAGE_NEW === $pageName){
           yield TextField::new('title', 'Titulo');
           yield TextField::new('director', 'Director');
           yield TextField::new('title', 'Titulo');
           yield TextareaField::new('synopsis', 'Sinopsis');
           yield NumberField::new('playingTime', 'Duración');
           yield DateField::new('premiereAt', 'Fecha de estreno');
           yield ArrayField::new('tags', 'Tags');
           yield CollectionField::new('actors','')
               ->allowAdd(true)
               ->allowDelete(true)
               ->setEntryType(ActorType::class);
       }

       if(Crud::PAGE_INDEX === $pageName){
           yield TextField::new('title', 'Titulo');
           yield TextField::new('director', 'Director');
           yield TextField::new('title', 'Titulo');
           yield TextareaField::new('synopsis', 'Sinopsis');
           yield NumberField::new('playingTime', 'Duración');
           yield DateField::new('premiereAt', 'Fecha de estreno');
           yield ArrayField::new('tags', 'Tags');
           yield CollectionField::new('actors', 'Actores');
           yield NumberField::new('rating', 'Puntuación');
       }
    }

}
