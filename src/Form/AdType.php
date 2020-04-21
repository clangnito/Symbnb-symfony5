<?php

namespace App\Form;

use App\Entity\Ad;
use App\Form\ImageType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class AdType extends ApplicationType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $builder
            ->add('title', TextType::class, $this->getConfiguration("Titre", "Le titre de l'annonce"))
            ->add('slug', TextType::class, $this->getConfiguration("Adresse web", "Adresse web (automatique)", [ 'required' => false ]))
            ->add('coverImage', UrlType::class, $this->getConfiguration("URL de l'image principale", "Donnez l'adresse d'une image attractive pour votre annonce"))
            ->add('introduction', TextType::class, $this->getConfiguration("Introduction", "La description globale de l'annonce"))
            ->add('contents', TextareaType::class, $this->getConfiguration("Description détaillée", "Tapez une description qui donne envie de venir chez vous"))
            ->add('rooms', IntegerType::class, $this->getConfiguration("Nombre de chambres", "Le nombre de chambres disponibles"))
            ->add('price', MoneyType::class, $this->getConfiguration("Prix par nuit", "Le prix pour une nuit"))
            ->add('images', CollectionType::class, ['entry_type' => ImageType::class, 'allow_add' => true, 'allow_delete' => true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
