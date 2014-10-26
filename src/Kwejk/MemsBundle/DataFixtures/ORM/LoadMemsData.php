<?php

namespace Kwejk\MemsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use Kwejk\MemsBundle\Entity\Mem;

/**
 * LoadMemsData
 */
class LoadMemsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder()
    {
        return 2;
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 15; $i++) {
            $mem = new Mem();
            $mem->setTitle('Test Mem no. '.$i);
            $mem->setCreatedBy($this->getReference('user'));
            $mem->setImageName('demo.jpg');
            $mem->setIsAccepted(true);
            $mem->setSlug('test-mem-no-'.$i);

            $manager->persist($mem);
        }

        $manager->flush();
    }
}