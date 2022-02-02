<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setName('Julia');
        $user->setEmail('julia.marchand@student.fr');
        $user->setSex('féminin');
        $user->setRoles(['ROLE_STUDENT']);

        $hashedPassword = $this->passwordHasher->hashPassword($user,
        'azertyuiop');
        $user->setPassword($hashedPassword);
        $manager->persist($user);

        $user2 = new User();
        $user2->setName('Benoit');
        $user2->setEmail('benoit.vidal@student.fr');
        $user2->setSex('masculin');
        $user2->setRoles(['ROLE_STUDENT']);

        $hashedPassword = $this->passwordHasher->hashPassword($user,
            'azertyuiop');
        $user2->setPassword($hashedPassword);
        $manager->persist($user2);

        $user3 = new User();
        $user3->setName('Marine');
        $user3->setEmail('marine.vidal@student.fr');
        $user3->setSex('féminin');
        $user3->setRoles(['ROLE_STUDENT']);

        $hashedPassword = $this->passwordHasher->hashPassword($user,
            'azertyuiop');
        $user3->setPassword($hashedPassword);
        $manager->persist($user3);

        $user4 = new User();
        $user4->setName('Audrey');
        $this->addReference('Audrey', $user4);
        $user4->setEmail('audrey.martin@teacher.fr');
        $user4->setUrl('https://static.wixstatic.com/media/a73a52_c8c1df3f431847dbb5cfab6fa3a05c97~mv2.jpg/v1/crop/x_0,y_180,w_720,h_720/fill/w_220,h_220,al_c,q_80,usm_0.66_1.00_0.01/Resized_StudioEquilibre_22_07_20_BD__ANA.webp');
        $user4->setDescription('Ancienne danseuse et passionnée de yoga, je me suis formée au yoga aérien et à la méditation');
        $user4->setSex('féminin');
        $user4->setRoles(['ROLE_TEACHER']);

        $hashedPassword = $this->passwordHasher->hashPassword($user,
            'azertyuiop');
        $user4->setPassword($hashedPassword);
        $manager->persist($user4);

        $user5 = new User();
        $user5->setName('Anaïs');
        $this->addReference('Anaïs', $user5);
        $user5->setEmail('anais.hattier@teacher.fr');
        $user5->setUrl('https://www.yogabikrambordeaux.com/wp-content/uploads/2021/10/Bikram.Bx03.06.21.BD%E2%94%AC%C2%AEANAKA-112-e1634915538817.jpg');
        $user5->setDescription('Je propose du Yoga Yin & Yang');
        $user5->setSex('féminin');
        $user5->setRoles(['ROLE_TEACHER']);

        $hashedPassword = $this->passwordHasher->hashPassword($user,
            'azertyuiop');
        $user5->setPassword($hashedPassword);
        $manager->persist($user5);

        $user6 = new User();
        $user6->setName('Stéphane');
        $this->addReference('Stéphane', $user6);
        $user6->setEmail('stephane.lupin@teacher.fr');
        $user6->setUrl('https://media.aladom.fr/users/999821/m/0.jpg');
        $user6->setDescription('Passionné de massages depuis tout jeune, je vous propose un instant bien-être au sein de cette belle équipe');
        $user6->setSex('masculin');
        $user6->setRoles(['ROLE_TEACHER']);

        $hashedPassword = $this->passwordHasher->hashPassword($user,
            'azertyuiop');
        $user6->setPassword($hashedPassword);
        $manager->persist($user6);

        $manager->flush();
    }
}
