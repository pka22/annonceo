<?php

namespace App\DataFixtures;
use App\Entity\Membre;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MembreFixtures extends Basefixtures
{

    protected function loadData(ObjectManager $manager)
    {
        // La fonction anonyme sera exécutée 50 fois
        $this->createMany(15, function ($num) {
            // Construction du nom d'artiste
            $name = $this->faker->randomElement(['DJ ', 'MC ', 'Lil ', '']);
            $name .= $this->faker->firstName;
            $name .= $this->faker->randomElement([
                ' ' . $this->faker->realText(10),
                ' aka ' . $this->faker->domainWord,
                ' & The ' . $this->faker->lastName,
                ''
            ]);
            $lastname = $this->faker->randomElement(['kl ', 'ji ', 'ma ', '']);
            $lastname .= $this->faker->lastName;
            $lastname .= $this->faker->randomElement([
                ' ' . $this->faker->realText(10),
                ' aka ' . $this->faker->domainWord,

            ]);
            $membre = (new Membre())
                ->setNom($name)
                ->setDescription( $this->faker->realText(10))
            ;
            // Toujours retourner l'entité
            return $membre;
        });
        // Pour terminer, enregistrer
        $manager->flush();
    }
}


