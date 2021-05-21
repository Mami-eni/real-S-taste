<?php

namespace App\DataFixtures;

use App\Entity\Residence;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
Use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
     $fakeInfoGenerator = Faker\Factory::create('fr_FR');

        for($i=0; $i <10; $i++)
        {
            $residence = new Residence();

            $residence->setAdresse($fakeInfoGenerator->address);
            $residence->setDateParution($fakeInfoGenerator->dateTime);
            $residence->setIsExterieur($fakeInfoGenerator->numberBetween(0,1));
            $residence->setIsGarage($fakeInfoGenerator->numberBetween(0,1));
            $residence->setIsVenteOrLocation($fakeInfoGenerator->numberBetween(0,1));
            $residence->setNombrePieces($fakeInfoGenerator->numberBetween(1,3));
            $residence->setPiscine(0);
            $residence->setPrix($fakeInfoGenerator->randomFloat(2,500,2000));
            $residence->setSuperficie($fakeInfoGenerator->randomFloat(2,1,20));
            $residence->setSurfaceExterieur($fakeInfoGenerator->randomFloat(2,10,200));
            $residence->setType("yourte");


            $manager->persist($residence);

        }



        $manager->flush();
    }
}
