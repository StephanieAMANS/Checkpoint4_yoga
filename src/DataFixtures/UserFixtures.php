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
        $user4->setSex('féminin');
        $user4->setRoles(['ROLE_USER']);

        $hashedPassword = $this->passwordHasher->hashPassword($user,
            'azertyuiop');
        $user4->setPassword($hashedPassword);
        $manager->persist($user4);

        $user5 = new User();
        $user5->setName('Anaïs');
        $this->addReference('Anaïs', $user5);
        $user5->setEmail('anais.hattier@teacher.fr');
        $user5->setSex('féminin');
        $user5->setRoles(['ROLE_USER']);

        $hashedPassword = $this->passwordHasher->hashPassword($user,
            'azertyuiop');
        $user5->setPassword($hashedPassword);
        $manager->persist($user5);

        $user6 = new User();
        $user6->setName('Stéphanie');
        $this->addReference('Stéphanie', $user6);
        $user6->setEmail('stephanie.amans@teacher.fr');
        $user6->setSex('féminin');
        $user6->setRoles(['ROLE_USER']);

        $hashedPassword = $this->passwordHasher->hashPassword($user,
            'azertyuiop');
        $user6->setPassword($hashedPassword);
        $manager->persist($user6);

        $manager->flush();
    }
}
