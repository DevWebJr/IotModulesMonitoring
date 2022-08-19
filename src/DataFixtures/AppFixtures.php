<?php

namespace App\DataFixtures;
use App\Entity\Module;
use App\Entity\Category;
use App\Entity\Energy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        /**Nombre float aléatoire**/
        $randomFloat = rand(0, 20) / 10;
        /**Adresse IP aléatoires**/
        $randIP = "".mt_rand(0, 255).".".mt_rand(0, 255).".".mt_rand(0, 255).".".mt_rand(0, 255);

        /**BASE DE DONNEES**/
        /**1.CATEGORY**/
        $category_01 = new Category();
        $category_01 -> setName("Équipement Personnel (Wearable)");
        /**Persistance des données dans la database**/
        $manager->persist($category_01);

        $category_02 = new Category();
        $category_02 -> setName("Agriculture / Logistique");
        /**Persistance des données dans la database**/
        $manager->persist($category_02);

        $category_03 = new Category();
        $category_03 -> setName("Sécurité");
        /**Persistance des données dans la database**/
        $manager->persist($category_03);

        $category_04 = new Category();
        $category_04 -> setName("Chauffage / Climatisation");
        /**Persistance des données dans la database**/
        $manager->persist($category_04);


        /**2.ENERGY**/
        $energy_01 = new Energy();
        $energy_01 -> setName("Température");
        $energy_01 -> setUnitOfMeasure("Degrés");
        $energy_01 -> setAbbreviation("C°");
        /**Persistance des données dans la database**/
        $manager->persist($energy_01);

        $energy_02 = new Energy();
        $energy_02 -> setName("Force");
        $energy_02 -> setUnitOfMeasure("Newton");
        $energy_02 -> setAbbreviation("N");
        /**Persistance des données dans la database**/
        $manager->persist($energy_02);

        $energy_03 = new Energy();
        $energy_03 -> setName("Pression");
        $energy_03 -> setUnitOfMeasure("Bar");
        $energy_03 -> setAbbreviation("bar");
        /**Persistance des données dans la database**/
        $manager->persist($energy_03);

        $energy_04 = new Energy();
        $energy_04 -> setName("Électricté");
        $energy_04 -> setUnitOfMeasure("Kilowattheure");
        $energy_04 -> setAbbreviation("KWh");
        /**Persistance des données dans la database**/
        $manager->persist($energy_04);

        $energy_05 = new Energy();
        $energy_05 -> setName("British Thermal Unit");
        $energy_05 -> setUnitOfMeasure("BTU");
        $energy_05 -> setAbbreviation("BTU");
        /**Persistance des données dans la database**/
        $manager->persist($energy_05);

        $energy_06 = new Energy();
        $energy_06 -> setName("Vitesse de Connexion Internet");
        $energy_06 -> setUnitOfMeasure("Megabit");
        $energy_06 -> setAbbreviation("Mbit/s");
        /**Persistance des données dans la database**/
        $manager->persist($energy_06);


        /**3.MODULES**/
        /**Création d'un tableau contenant des noms de modules génériques**/
        $items = array(
            1 => "Volets Connectés",
            2 => "Aspirateur",
            3 => "Smart TV",
            4 => "Montre",

            5 => "Capteur pour arbres fruitiers",
            6 => "arrosage automatique",
            7 => "Collier bovin",
            8 => "Robot de binage",

            9 => "Caméra",
            10 => "Alarme",
            11 => "Détecteurs de mouvements",
            12 => "Détecteurs de fumée",
            13 => "Détecteurs de fuite d’eau",
            14 => "Détecteurs d’émanation toxique",

            15 => "Climatiseur",
            16 => "Radiateur"
        );

        /**Boucle pour générer 50 modules
         * avec des données fictives cohérentes
         */
        for($i = 1; $i <= 50; $i++) {
            $module = new Module();
            $module->setItem(array_rand($items, 1));
            /**Adresses IP random**/
            $module->setIpAddress($randIP);
            /**Parfois le module serait allumé, parfois non**/
            $module->setAlight(rand(0, 1));
            /**Parfois le module serait fonctionnel, parfois non**/
            $module->setFunctional(rand(0, 1));

            /**Selon l'item une catégorie est assignée de manière cohérente**/

            /**Équipement Personnel (Wearable)**/
            if(
                $module   ->getItem() == 1
                OR $module->getItem() == 2
                OR $module->getItem() == 3
                OR $module->getItem() == 4
                ) {
                    $module->setCategory($category_01);
                    if (
                        $module   ->getItem() == 1
                        OR $module->getItem() == 2
                    ) {
                        /**Électricté**/
                        $module->setEnergy($energy_04);
                        /**KWh**/
                        $module->setValue($randomFloat);
                    }
                    else {
                        /**Vitesse de Connexion Internet**/
                        $module->setEnergy($energy_06);
                        /**Mbit/s**/
                        $module->setValue(floatval(rand(1 ,9)));
                    }
            }

            /**Agriculture / Logistique**/
            elseif (
                $module   ->getItem() == 5
                OR $module->getItem() == 6
                OR $module->getItem() == 7
                OR $module->getItem() == 8
                ) {
                    $module->setCategory($category_02);
                    if (
                        $module   ->getItem() == 6
                    ) {
                        /**Force**/
                        $module->setEnergy($energy_02);
                        /**bar**/
                        $module->setValue(floatval(rand(1, 6)));
                    }
                    else {
                        /**Vitesse de Connexion Internet**/
                        $module->setEnergy($energy_06);
                        /**Mbit/s**/
                        $module->setValue(floatval(rand(1 ,9)));
                    }
            }

            /**Sécurité**/
            elseif (
                $module->getItem() == 9
                OR $module->getItem() == 10
                OR $module->getItem() == 11
                OR $module->getItem() == 12
                OR $module->getItem() == 13
                OR $module->getItem() == 14
                ) {
                $module->setCategory($category_03);
                if (
                    $module   ->getItem() == 9
                    OR $module->getItem() == 10
                    OR $module->getItem() == 11
                    OR $module->getItem() == 12
                ) {
                    /**Électricté**/
                    $module->setEnergy($energy_04);
                    /**KWh**/
                    $module->setValue($randomFloat);
                }
                else {
                    /**Vitesse de Connexion Internet**/
                    $module->setEnergy($energy_03);
                    /**Mbit/s**/
                    $module->setValue(floatval(rand(1 ,9)));
                }
            }

            /**Chauffage / Climatisation**/
            elseif (
                $module   ->getItem() == 15
                OR $module->getItem() == 16
            ) {
                $module->setCategory($category_04);
                if (
                    $module   ->getItem() == 14
                    OR $module->getItem() == 15
                ) {
                    /**Température**/
                    $module->setEnergy($energy_01);
                    /**KWh**/
                    $module->setValue(floatval(rand(5 ,55)));
                }
                else {
                    /**Force**/
                    $module->setEnergy($energy_02);
                    /**bar**/
                    $module->setValue(floatval(rand(1, 6)));
                }
            }

            /**Persistance des données dans la database**/
            $manager->persist($i);
        }

        /**Mise à jour de la database**/
        $manager->flush();
    }
}
