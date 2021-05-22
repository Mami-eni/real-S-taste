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
            ->add('superficie',NumberType::class , ["scale"=>2, "label"=>"Superficy", "attr"=>[ "min"=>0]])
            ->add('nombre_pieces', IntegerType::class, ["label"=>"Rooms", "attr"=>[ "min"=>1]])
            ->add('adresse', TextType::class, ["label"=>"Adress"])
            ->add('type', ChoiceType::class, [ "choices"=>["Flat"=>"flat","House"=> "house","Yourte"=> "yourte"], "label"=>"Residence type"])
            ->add('piscine', ChoiceType::class, [ "choices" =>["Yes"=>1,"No"=>0], "label"=>"Pool ?", "expanded"=>true])
            ->add('isExterieur', ChoiceType::class, [  "choices" =>["Yes"=>1,"No"=>0],"label"=>"Yard ?",  "expanded"=>true,
                                                                  'attr' => [ 'class' => 'exterior_surface']] )
            ->add('surface_exterieur' , NumberType::class,["scale"=>2, "label"=>"Yard surface", "required"=>false, "attr"=>[ "min"=>0]])
            ->add('isGarage', ChoiceType::class, [ "choices" =>["Yes"=>1,"No"=>0],"label"=>"Garage ?", "expanded"=>true])
            ->add('isVenteOrLocation', ChoiceType::class, ["choices" =>["Yes"=>1,"No"=>0] ,"label"=>"Sale ?", "expanded"=>true])
            ->add('prix', NumberType::class, ["label"=>"Price", "scale"=>2, "attr"=>[ "min"=>0]])


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Residence::class,
        ]);
    }
}
