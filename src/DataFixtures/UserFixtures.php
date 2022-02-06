<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Training;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {

        $user = new User();
        $user->setName('Audrey');
        $this->addReference('Audrey', $user);
        $user->addTraining($this->getReference('Fly Yoga'));
        $user->setEmail('audrey.martin@teacher.fr');
        $user->setUrl('https://static.wixstatic.com/media/a73a52_c8c1df3f431847dbb5cfab6fa3a05c97~mv2.jpg/v1/crop/x_0,y_180,w_720,h_720/fill/w_220,h_220,al_c,q_80,usm_0.66_1.00_0.01/Resized_StudioEquilibre_22_07_20_BD__ANA.webp');
        $user->setDescription('Ancienne danseuse et passionnée de yoga, je me suis formée au yoga aérien et à la méditation');
        $user->setSex('féminin');
        $user->setRoles(['ROLE_TEACHER']);

        $hashedPassword = $this->passwordHasher->hashPassword($user,
            'azertyuiop');
        $user->setPassword($hashedPassword);
        $manager->persist($user);

        $user2 = new User();
        $user2->setName('Anaïs');
        $this->addReference('Anaïs', $user2);
        $user2->addTraining($this->getReference('Yoga Yin Yang'));
        $user2->setEmail('anais.hattier@teacher.fr');
        $user2->setUrl('https://www.yogabikrambordeaux.com/wp-content/uploads/2021/10/Bikram.Bx03.06.21.BD%E2%94%AC%C2%AEANAKA-112-e1634915538817.jpg');
        $user2->setDescription('J\'ai découvert le yoga lors d\'un voyage en Inde. Au studio, vous pourrez pratiquer du Yoga Yin Yang');
        $user2->setSex('féminin');
        $user2->setRoles(['ROLE_TEACHER']);

        $hashedPassword = $this->passwordHasher->hashPassword($user,
            'azertyuiop');
        $user2->setPassword($hashedPassword);
        $manager->persist($user2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            TrainingFixtures::class
        ];
    }
}
