<?php

namespace AppBundle\Repository;

/**
 * SongsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SongsRepository extends \Doctrine\ORM\EntityRepository
{

    public function findYears(){

        return self::createQueryBuilder('s')
            ->select('s.year')
            ->where('s.year != 0000')
            ->groupBy('s.year')
            ->orderBy('s.year')
            ->getQuery()
            ->getResult();
    }

    public function findBands(){

        return self::createQueryBuilder('s')
            ->select('s.band')
            ->where('s.band is NOT NULL')
            ->groupBy('s.band')
            ->orderBy('s.band')
            ->getQuery()
            ->getResult();
    }
}
