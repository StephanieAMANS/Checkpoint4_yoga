<?php

namespace App\DataFixtures;

use App\Entity\Equipment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EquipmentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $equipment = new Equipment();
        $equipment->setName('hamac');
        $this->addReference('hamac', $equipment);
        $manager->persist($equipment);


        $equipment2 = new Equipment();
        $equipment2->setName('tapis');
        $this->addReference('tapis', $equipment2);
        $manager->persist($equipment2);

        $equipment3 = new Equipment();
        $equipment3->setName('bolster');
        $this->addReference('bolster', $equipment3);
        $manager->persist($equipment3);

        $equipment4 = new Equipment();
        $equipment4->setName('ballon');
        $this->addReference('ballon', $equipment4);
        $manager->persist($equipment4);

        $equipment5 = new Equipment();
        $equipment5->setName('baton');
        $this->addReference('baton', $equipment5);
        $manager->persist($equipment5);

        $equipment6 = new Equipment();
        $equipment6->setName('table de massage');
        $this->addReference('table de massage', $equipment6);
        $manager->persist($equipment6);

        $manager->flush();
    }
}
