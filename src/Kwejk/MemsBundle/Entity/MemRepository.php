<?php

namespace Kwejk\MemsBundle\Entity;

use Doctrine\ORM\EntityRepository;

class MemRepository extends EntityRepository
{
    public function getRandom()
    {
        // pobieramy ilość memów
        $count = $this->createQueryBuilder('u')
            ->select('COUNT(u)')
            ->where('u.isAccepted = true')
            ->getQuery()
            ->getSingleScalarResult();
        
        return $this->createQueryBuilder('u')
            ->where('u.isAccepted = true')
            ->setFirstResult(rand(0, $count - 1))
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult();
    }
}
