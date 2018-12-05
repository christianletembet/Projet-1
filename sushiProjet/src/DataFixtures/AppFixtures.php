<?php

namespace App\DataFixtures;

use App\Entity\Livreur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create();

        for ($i=0;$i<=10;$i++){
            $livreur = new Livreur();

            $livreur->setNom($faker->lastName);
            $livreur->setPrenom($faker->firstName);
            $livreur->setEmail($faker->email);
            $livreur->setTelephone($faker->phoneNumber);
            $livreur->setNombreLivraisons($faker->numberBetween($min =0, $max = 350));
            $livreur->setTempsLivraison($faker->numberBetween($min =2, $max = 45));
            $livreur->setAbsences($faker->numberBetween($min = 0, $max =20));
            $livreur->setEtatCommande($faker->numberBetween($min = 0, $max = 10));


            $manager->persist($livreur);
        }



        $manager->flush();
    }
}
