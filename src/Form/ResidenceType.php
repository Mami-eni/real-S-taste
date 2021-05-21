<?php

namespace App\Form;

use App\Entity\Residence;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResidenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('superficie',NumberType::class , [ "scale"=>2,"required"=>false, "label"=>"Superficy"])
            ->add('nombre_pieces', IntegerType::class, ["label"=>"Rooms"])
            ->add('adresse', TextType::class, ["label"=>"Adress"])
            ->add('type', ChoiceType::class, [ "choices"=>["Appartement"=>"appartement","House"=> "maison","Yourte"=> "yourte"], "label"=>"Residence type"])
            ->add('piscine', RadioType::class, ["label"=>"Pool ?"])
            ->add('isExterieur', RadioType::class, ["label"=>"Yard ?"])
            ->add('surface_exterieur' , NumberType::class,["scale"=>2, "label"=>"Yard surface", "required"=>false])
            ->add('isGarage', RadioType::class, ["label"=>"Garage ?"])
            ->add('isVenteOrLocation', RadioType::class, ["label"=>"Sale ?"])
            ->add('prix', NumberType::class, ["label"=>"Price", "scale"=>2])
            ->add('Create', ButtonType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Residence::class,
        ]);
    }
}
