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
        $this->addReference('Fly Yoga', $training);
        $training->setDescription('Yoga entre Ciel et Terre - postions de yoga dans un hamac et 
        étirements sur tapis');
        $training->addEquipment($this->getReference('hamac'));
        $training->addEquipment($this->getReference('tapis'));
        $training->setUrl('https://64.media.tumblr.com/299ffb7ee53348ffd99eb2fe58592571/c960106fc36c08cb-8e/s1280x1920/979fd121c97e4d5b9be5d057544b970557979bb3.jpg');
        $manager->persist($training);

        $training2 = new Training();
        $training2->setName('Fly méditation');
        $this->addReference('Fly méditation', $training);
        $training2->setDescription('Yoga entre Ciel et Terre - méditation dans un hamac et 
        réveil sur tapis');
        $training2->addEquipment($this->getReference('hamac'));
        $training2->addEquipment($this->getReference('tapis'));
        $training2->setUrl('https://i.pinimg.com/originals/4a/de/67/4ade67f82dd06305fda1307c47bdf4e4.jpg');
        $manager->persist($training2);

        $training3 = new Training();
        $training3->setName('Yoga Yin Yang');
        $this->addReference('Yoga Yin Yang', $training);
        $training3->setDescription('Yoga sur tapis - étirements et respiration');
        $training3->addEquipment($this->getReference('tapis'));
        $training3->addEquipment($this->getReference('bolster'));
        $training3->setUrl('https://xsn1w2yn92v2spmxk15sk3p2-wpengine.netdna-ssl.com/wp-content/uploads/2020/10/yin-yang-min.jpg');
        $manager->persist($training3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            EquipmentFixtures::class
        ];
    }
}
