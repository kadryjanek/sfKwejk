<?php

namespace Kwejk\MemsBundle\Entity;

use Doctrine\ORM\EntityRepository;

class RatingRepository extends EntityRepository
{
    public function getMemAvgRating($mem)
    {
        $query = $this->getEntityManager()->createQueryBuilder();

        $query->select('count(r.id) as totalRatingCount,
            avg(r.rating) as avgRating')
            ->from('KwejkMemsBundle:Rating', 'r')
            ->where('r.mem = :mem')
            ->setParameter('mem', $mem);

        return $query->getQuery()->getSingleResult();
    }
}
