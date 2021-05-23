<?php

namespace App\Form;

use App\Other\Filtre;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiltreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('superficie',NumberType::class , ["scale"=>2,"required"=>false, "label"=>"Superficy", "attr"=>[ "min"=>0]])
            ->add('nombre_pieces',IntegerType::class, [ "required"=>false,"label"=>"Rooms", "attr"=>[ "min"=>1]])
            ->add('adresse', TextareaType::class, ["required"=>false, "label"=>"Adress"])
            ->add('type', ChoiceType::class, [ "required"=>false, "choices"=>["Flat"=>"flat","House"=> "house","Yourte"=> "yourte"], "placeholder"=>"select a value","label"=>"Residence type"])
            ->add('piscine', ChoiceType::class, [ "required"=>false, "choices" =>["Yes"=>true,"No"=>false], "label"=>"Pool ?", "expanded"=>true, "placeholder"=> null])
            ->add('isExterieur', ChoiceType::class, [ "required"=>false, "choices" =>["Yes"=>true,"No"=>false],"label"=>"Yard ?",  "expanded"=>true,"placeholder"=> null,
                'attr' => [ 'class' => 'exterior_surface']] )
            ->add('surface_exterieur' , NumberType::class,["scale"=>2, "label"=>"Yard surface", "required"=>false, "attr"=>[ "min"=>0]])
            ->add('isGarage', ChoiceType::class, ["required"=>false, "choices" =>["Yes"=>true,"No"=>false],"label"=>"Garage ?", "expanded"=>true, "placeholder"=> null])
            ->add('isVenteOrLocation', ChoiceType::class, [ "required"=>false,"choices" =>["Yes"=>true,"No"=>false] ,"label"=>"Sale ?", "expanded"=>true, "placeholder"=> null, "empty_data" =>null])
            ->add('prix', NumberType::class, ["required"=>false,"label"=>"Price", "scale"=>2, "attr"=>[ "min"=>0] ])
            ->add('dateParution', DateTimeType::class, ["required"=>false, "label"=>"Publication date","html5"=>true,"empty_data" =>null, "input"=>"datetime"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
            'data_class'=> Filtre::class,
        ]);
    }
}
