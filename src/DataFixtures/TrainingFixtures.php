<?php

namespace App\DataFixtures;

use App\Entity\Training;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TrainingFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $training = new Training();
        $training->setName('Fly Yoga');
        $training->setDescription('Yoga entre Ciel et Terre - postions de yoga dans un hamac et 
        étirements sur tapis');
        $training->addEquipment($this->getReference('hamac'));
        $manager->persist($training);

        $training2 = new Training();
        $training2->setName('Fly méditation');
        $training2->setDescription('Yoga entre Ciel et Terre - méditation dans un hamac et 
        réveil sur tapis');
        $training2->addEquipment($this->getReference('hamac'));
        $manager->persist($training2);

        $training3 = new Training();
        $training3->setName('Yoga Yin Yang');
        $training3->setDescription('Yoga sur tapis - étirements et respiration');
        $training3->addEquipment($this->getReference('tapis'));
        $manager->persist($training3);

        $training4 = new Training();
        $training4->setName('Massage bien-être');
        $training4->setDescription('Massage au choix - selon votre envie et votre humeur du moment');
        $training4->addEquipment($this->getReference('table de massage'));
        $manager->persist($training4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            EquipmentFixtures::class
        ];
    }
}
