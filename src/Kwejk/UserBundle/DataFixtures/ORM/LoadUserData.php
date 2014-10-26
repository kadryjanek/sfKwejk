<?php

namespace Kwejk\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Kwejk\UserBundle\Entity\User;

/**
 * LoadUserData
 */
class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder()
    {
        return 1;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();

        $user->setPlainPassword('demo');
        $user->setEmail('user@localhost');
        $user->setUsername('demo');
        $user->setLocked(false);
        $user->setExpired(false);
        $user->setEnabled(true);

        $this->addReference('user', $user);

        $manager->persist($user);

        $manager->flush();
    }
}