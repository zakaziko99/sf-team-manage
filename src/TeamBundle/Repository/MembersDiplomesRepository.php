<?php

namespace TeamBundle\Repository;

/**
 * MembersDiplomesRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MembersDiplomesRepository extends \Doctrine\ORM\EntityRepository
{
    private function queryRequest()
    {
        $qb = $this->createQueryBuilder('md')
                ->select('md, mb, dm')
                ->join('md.member', 'mb')
                ->join('md.diplome', 'dm');

        return $qb;
    }

    public function findMembersDiplomesWithDetails()
    {
        $qb = $this->queryRequest()
                ->orderBy('md.year', 'ASC');

        return $qb->getQuery()->getResult();
    }

    public function findAll()
    {
        return $this->findMembersDiplomesWithDetails();
    }

    public function findMemberDiplomeWithDetailsById($id)
    {
        $qb = $this->queryRequest()
                ->where('md.id = :id')
                ->setParameter('id', $id);

        return $qb->getQuery()->getSingleResult();
    }

    public function find($id)
    {
        return $this->findMemberDiplomeWithDetailsById($id);
    }
}
