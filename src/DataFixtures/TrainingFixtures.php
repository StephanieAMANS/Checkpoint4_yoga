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
        $this->addReference('cours1', $training);
        $training->setDescription('Yoga entre Ciel et Terre - postions de yoga dans un hamac et 
        étirements sur tapis');
        $training->addEquipment($this->getReference('hamac'));
        $training->setUrl('https://64.media.tumblr.com/299ffb7ee53348ffd99eb2fe58592571/c960106fc36c08cb-8e/s1280x1920/979fd121c97e4d5b9be5d057544b970557979bb3.jpg');
        $manager->persist($training);

        $training2 = new Training();
        $training2->setName('Fly méditation');
        $this->addReference('cours2', $training);
        $training2->setDescription('Yoga entre Ciel et Terre - méditation dans un hamac et 
        réveil sur tapis');
        $training2->addEquipment($this->getReference('hamac'));
        $training2->setUrl('https://i.pinimg.com/originals/4a/de/67/4ade67f82dd06305fda1307c47bdf4e4.jpg');
        $manager->persist($training2);

        $training3 = new Training();
        $training3->setName('Yoga Yin Yang');
        $this->addReference('cours3', $training);
        $training3->setDescription('Yoga sur tapis - étirements et respiration');
        $training3->addEquipment($this->getReference('tapis'));
        $training3->setUrl('https://www.casayoga.tv/images/images-videos/564-casayogatv-cours-en-ligne-yin-yoga-4-5-posture-du-chat-demi-selle-torsion-surelevee-delphine-martin-michaud-yin-yoga-6387.jpg');
        $manager->persist($training3);

        $training4 = new Training();
        $training4->setName('Massage bien-être');
        $this->addReference('cours4', $training);
        $training4->setDescription('Massage au choix - selon votre envie et votre humeur du moment');
        $training4->addEquipment($this->getReference('table de massage'));
        $training3->setUrl('https://www.experiencecotedazur.com/wp-content/uploads/wpetourisme/big-ticket-image-60787716c57b4845225298-cropped600-400.jpeg');
        $manager->persist($training4);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            EquipmentFixtures::class
        ];
    }
}
